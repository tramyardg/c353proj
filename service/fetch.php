<?php
require '../db/DB.php';

require '../model/Author.php';
require '../model/Publisher.php';
require '../controller/AuthorController.php';
require '../controller/PublisherController.php';

$aController = new AuthorController();
$pbController = new PublisherController();

if (isset($_GET["authors"]) && $_GET["authors"] == "all") {
    // add more security:
    // another if statement to verify employee's email if exists and employee type is admin
    echo $aController->fetchAuthors();
}

if (isset($_GET["publishers"]) && $_GET["publishers"] == "all") {
    echo $pbController->fetchPublishers();
}

