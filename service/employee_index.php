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

if(isset($_GET["employeeId"]) && count($eController->findByEmployeeId($_GET["employeeId"])))
{
    if (isset($_GET["authors"]) && $_GET["authors"] == "all") {
        echo $aController->fetchAuthors();
    }

    if (isset($_GET["publishers"]) && $_GET["publishers"] == "all") {
        echo $pbController->fetchPublishers();
    }
}
