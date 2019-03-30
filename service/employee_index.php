<?php
require '../db/DB.php';
require '../model/Employee.php';
require '../model/Author.php';
require '../model/Book.php';
require '../model/Publisher.php';
require '../model/BookInventory.php';
require '../model/Shipment.php';

require '../controller/EmployeeController.php';
require '../controller/AuthorController.php';
require '../controller/BookController.php';
require '../controller/PublisherController.php';
require '../controller/BookInventoryController.php';
require '../controller/ShipmentController.php';

$eController = new EmployeeController();
$aController = new AuthorController();
$pbController = new PublisherController();
$shController = new ShipmentController();

if (isset($_GET["employeeId"])) {
    if (isset($_GET["authors"]) && $_GET["authors"] == "all") {
        echo $aController->fetchAuthors();
    }

    if (isset($_GET["publishers"]) && $_GET["publishers"] == "all") {
        echo $pbController->fetchPublishers();
    }

    // receive shipment
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['shipmentItems'])) {
            $shipmentsToReceive = $_POST['shipmentItems'];
            for ($i = 0; $i < count($shipmentsToReceive); $i++) {

                $shipment = new Shipment();
                $shipment->setShipmentId($shipmentsToReceive[$i]);

                $sObj = new Shipment();
                $sObj = $shController->fetchShipmentById($shipment)[0];

                $shController->update($sObj);
            }
        }
    }

}
