<?php
require '../db/DB.php';

require '../model/Author.php';
require '../model/Publisher.php';
require '../controller/AuthorController.php';
require '../controller/PublisherController.php';

$aController = new AuthorController();
if (isset($_GET["authors"]) && $_GET["authors"] == "all") {
    echo $aController->fetchAuthors();
}

$pbController = new PublisherController();
if (isset($_GET["publishers"]) && $_GET["publishers"] == "all") {
    echo $pbController->fetchPublishers();
}

