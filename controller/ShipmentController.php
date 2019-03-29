<?php


class ShipmentController
{
    public function fetchShipments()
    {
        $sql = "SELECT * FROM shipments;";
        $stmt = DB::getInstance()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, "Shipment");
    }

    public function fetchShipmentById(Shipment $shipment)
    {
        $sql = "SELECT * FROM shipments WHERE shipment_id = ?;";
        $stmt = DB::getInstance()->prepare($sql);
        $stmt->execute([$shipment->getShipmentId()]);
        return $stmt->fetchAll(PDO::FETCH_CLASS, "Shipment");
    }

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

    public function forReceiveShipmentTab()
    {

        $sql = 'SELECT b.title, b.isbn, s.qty_to_receive, p.publisher_id, p.company_name, s.date_shipped, s.is_received
                FROM shipments s,
                     books b,
                     publishers p
                WHERE b.publisher_id = p.publisher_id
                  AND p.publisher_id = s.publisher_id
                  AND b.book_id = s.book_id;';

        $stmt = DB::getInstance()->prepare($sql);
        $stmt->execute();


        $shipments = null;

        foreach ($stmt->fetchAll() as $k) {
            print_r($k);
        }
        return $shipments;
    }
}