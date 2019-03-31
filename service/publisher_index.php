<?php
require '../db/DB.php';
require '../model/Author.php';
require '../model/Book.php';
require '../model/Publisher.php';

require '../controller/AuthorController.php';
require '../controller/BookController.php';
require '../controller/PublisherController.php';

$aController = new AuthorController();
$pbController = new PublisherController();
$bkController = new BookController();

if (isset($_GET["publisherId"])) {
    if (isset($_GET['publishers']) && $_GET['publishers'] == "byId") {
        echo json_encode($bkController->fetchBookByPublisherId($_GET["publisherId"]), JSON_PRETTY_PRINT);
    }
}