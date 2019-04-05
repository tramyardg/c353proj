<?php


class BookstoreOrderController
{

    public function fetchBookstoreOrdersByPublisherId($id)
    {
        $sql = "SELECT * FROM bookstore_orders WHERE publisher_id = ?;";
        $stmt = DB::getInstance()->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetchAll(PDO::FETCH_CLASS, "BookstoreOrder");
    }

    public function fetchOrdersJoinBooksPublisher()
    {
        $sql = 'SELECT
                    bo.*,
                    b.title,
                    b.isbn,
                    b.edition,
                    b.price,
                    b.category,
                    p.publisher_id,
                    p.company_name
                FROM
                    bookstore_orders bo,
                    books b,
                    publishers p
                WHERE
                    bo.book_id = b.book_id 
                    AND bo.publisher_id = p.publisher_id;';
        $stmt = DB::getInstance()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // for publisher
    public function fetchBookstoreOrdersWithQtyOnHand($id)
    {
        $sql = 'SELECT
                    bo.*,
                    b.*,
                    p.*
                FROM
                    bookstore_orders bo,
                    books b,
                    pb_books_inventory p
                WHERE
                    bo.book_id = b.book_id 
                    AND bo.publisher_id = p.publisher_id
                    AND bo.book_id = p.book_id
                    AND p.publisher_id = ?;';
        $stmt = DB::getInstance()->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetchAll();
    }

    public function save(BookstoreOrder $bookstoreOrder)
    {
        $sql = 'INSERT INTO `bookstore_orders`(
                    `book_id`,
                    `publisher_id`,
                    `qty_ordered`,
                    `status`,
                    `date_requested`,
                    `period_specified`,
                    `date_shipped`
                ) VALUES(?, ?, ?, ?, ?, ?, ?);';
        $stmt = DB::getInstance()->prepare($sql);
        $exec = $stmt->execute([
            $bookstoreOrder->getBookId(),
            $bookstoreOrder->getPublisherId(),
            $bookstoreOrder->getQtyOrdered(),
            $bookstoreOrder->getStatus(),
            $bookstoreOrder->getDateRequested(),
            $bookstoreOrder->getPeriodSpecified(),
            $bookstoreOrder->getDateShipped()
        ]);
        return ['result' => $exec];
    }

    // for publisher not supposed to be here?
    public function update(BookstoreOrder $shipment)
    {
        // update shipment is_received status and date received
        /*
        $current_date = date('Y-m-d');
        $sql = "UPDATE `shipments` SET is_received = ?, date_received = ? WHERE shipment_id = ?";
        $stmt = DB::getInstance()->prepare($sql);
        $exec = $stmt->execute(['1', $current_date, $shipment->getShipmentId()]);

        // update book inventory
        $bkInventory = new BookInventoryController();
        $bkInventory->updateByBookIdAndQtyReceived($shipment->getBookId(), $shipment->getQtyToReceive());

        echo json_encode(array('result' => $exec));
        */
    }

    public function fetchShipmentsToReceive()
    {
        /*
        $shipments = $this->fetchBookstoreOrders();
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
        */
    }
}