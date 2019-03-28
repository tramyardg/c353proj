<?php
require '../db/DB.php';

// authors
require '../model/Author.php';
require '../controller/AuthorController.php';

$aController = new AuthorController();

if (isset($_GET["fetch"]) && $_GET["fetch"] == "all") {
    echo $aController->fetchAuthors();
}
