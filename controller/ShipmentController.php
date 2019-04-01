<?php


class ShipmentController
{
    // good
    public function fetchShipments()
    {
        $sql = "SELECT * FROM shipments;";
        $stmt = DB::getInstance()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, "Shipment");
    }

    // good
    public function fetchShipmentById(Shipment $shipment)
    {
        $sql = "SELECT * FROM shipments WHERE shipment_id = ?;";
        $stmt = DB::getInstance()->prepare($sql);
        $stmt->execute([$shipment->getShipmentId()]);
        return $stmt->fetchAll(PDO::FETCH_CLASS, "Shipment");
    }

    // for publisher, not supposed to be here
    public function save(Shipment $shipment)
    {
        $sql = 'INSERT INTO `shipments` (`book_id`, `publisher_id`, `qty_to_receive`, `is_received`, `date_shipped`, `date_received`) VALUES (?, ?, ?, ?, ?, ?)';
        $stmt = DB::getInstance()->prepare($sql);

        $shipment->setIsReceived('1');
        $current_date = date('Y-m-d');
        $shipment->setDateReceived($current_date);

        $exec = $stmt->execute(
            array(
                $shipment->getBookId(),
                $shipment->getPublisherId(),
                $shipment->getQtyToReceive(),
                $shipment->getIsReceived(),
                $shipment->getDateShipped(),
                $shipment->getDateReceived()
            )
        );
        echo json_encode(array('result' => $exec));
    }

    // for publisher not supposed to be here
    public function update(Shipment $shipment)
    {
        // update shipment is_received status and date received
        $current_date = date('Y-m-d');
        $sql = "UPDATE `shipments` SET is_received = ?, date_received = ? WHERE shipment_id = ?";
        $stmt = DB::getInstance()->prepare($sql);
        $exec = $stmt->execute(['1', $current_date, $shipment->getShipmentId()]);

        // update book inventory
        $bkInventory = new BookInventoryController();
        $bkInventory->updateByBookIdAndQtyReceived($shipment->getBookId(), $shipment->getQtyToReceive());

        echo json_encode(array('result' => $exec));
    }

    // to be updated
    public function fetchShipmentsToReceive()
    {
        $shipments = $this->fetchShipments();
        $out = null;

        $bkController = new BookController();
        $pbController = new PublisherController();

        foreach ($shipments as $k) {
            $book = $bkController->fetchBookById($k->getBookId())[0];
            $publisher = $pbController->fetchPublisherById($k->getPublisherId())[0];
            // only displays 'to be added' shipment in the table
            if ($k->getIsReceived() == "0") {
                $item = [
                    'shipment_id' => $k->getShipmentId(),
                    'book_id' => $k->getBookId(),
                    'book_title' => $book->getTitle(),
                    'isbn' => $book->getIsbn(),
                    'qty_to_receive' => $k->getQtyToReceive(),
                    'publisher_id' => $k->getPublisherId(),
                    'company_name' => $publisher->getCompanyName(),
                    'date_shipped' => $k->getDateShipped(),
                    'date_received' => $k->getDateReceived(),
                    'is_received' => $k->getIsReceived()
                ];
                $out[] = $item;
            }
        }
        return $out;
    }
}