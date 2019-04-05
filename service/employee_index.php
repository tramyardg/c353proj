<?php
require '../db/DB.php';
require '../model/Employee.php';
require '../model/Author.php';
require '../model/Book.php';
require '../model/Publisher.php';
require '../model/BookInventory.php';
require '../model/BookstoreOrder.php';

require '../controller/EmployeeController.php';
require '../controller/AuthorController.php';
require '../controller/BookController.php';
require '../controller/PublisherController.php';
require '../controller/BookInventoryController.php';
require '../controller/BookstoreOrderController.php';

if (isset($_GET["employeeId"])) {
    if (isset($_GET["authors"]) && $_GET["authors"] == "all") {
        $aController = new AuthorController();
        echo $aController->fetchAuthors();
    }

    if (isset($_GET["publishers"]) && $_GET["publishers"] == "all") {
        $pbController = new PublisherController();
        echo $pbController->fetchPublishers();
    }

    // receive shipment
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        /*
        if (isset($_POST['shipmentItems'])) {
            $shipmentsToReceive = $_POST['shipmentItems'];
            for ($i = 0; $i < count($shipmentsToReceive); $i++) {

                $shipment = new BookstoreOrder();
                $shipment->setShipmentId($shipmentsToReceive[$i]);

                $sObj = new BookstoreOrder();
                $sObj = $shController->fetchBookstoreOrdersById($shipment)[0];

                $shController->update($sObj);
            }
        }
        */
    }

    // employee order book
    if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST) && isset($_POST['orderBookPayload'])) {
        $bookstoreOrder = new BookstoreOrder();
        $bookstoreOrder->setBookId($_POST['orderBookPayload']['bookId']);
        $bookstoreOrder->setPublisherId($_POST['orderBookPayload']['publisherId']);
        $bookstoreOrder->setQtyOrdered($_POST['orderBookPayload']['qtyOrdered']);

        $result = [];
        $bookstoreOrderController = new BookstoreOrderController();
        $result = $bookstoreOrderController->save($bookstoreOrder);
        // if something went wrong -> {result: false}
        // otherwise, result -> {result: true}
        echo json_encode($result);
    }
}
