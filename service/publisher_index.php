<?php
require '../db/DB.php';
require '../model/Author.php';
require '../model/Book.php';
require '../model/BookAuthors.php';
require '../model/Publisher.php';
require '../model/BookInventory.php';

require '../controller/BookController.php';
require '../controller/AuthorController.php';
require '../controller/PublisherController.php';
require '../controller/BookAuthorsController.php';
require '../controller/BookInventoryController.php';

$aController = new AuthorController();
$pbController = new PublisherController();
$bkController = new BookController();
$baController = new BookAuthorsController();
$biController = new BookInventoryController();

// minimum requirement -> publisher id to be able to do these functions
if (isset($_GET["publisherId"])) {

    if (isset($_GET["authors"]) && $_GET["authors"] == "all") {
        echo $aController->fetchAuthors();
    }

    if (isset($_GET['publishers']) && $_GET['publishers'] == "byId") {
        echo json_encode($bkController->fetchBookByPublisherId($_GET["publisherId"]), JSON_PRETTY_PRINT);
    }

    // add new book
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["addBookData"])) {
        $newBook = new Book();
        $newBook->setIsbn($_POST["addBookData"]["isbn"]);
        $newBook->setTitle($_POST["addBookData"]["title"]);
        $newBook->setEdition($_POST["addBookData"]["edition"]);
        $newBook->setPrice($_POST["addBookData"]["price"]);
        $newBook->setCategory($_POST["addBookData"]["category"]);
        $newBook->setPublisherId($_POST["addBookData"]["publisherId"]);
        $newBook->setImage($_POST["addBookData"]['image']);
        echo '<pre>';
        print_r($newBook);

        $bkController->save($newBook);
        $bkId = DB::getInstance()->lastInsertId();

        // get all the authors and insert it to book authors table
        // one book can have many authors
        $authorsId = $_POST["addBookData"]["authorsId"];
        for ($i = 0; $i < count($authorsId); $i++) {
            $bookAuthors = new BookAuthors();
            $bookAuthors->setBookId($bkId);
            $bookAuthors->setAuthorId($authorsId[$i]);
            $baController->save($bookAuthors);
        }

        // insert to publisher book inventory as well with quantity
        $qtyOnHand = $_POST["addBookData"]["quantity"];
        $bookInventory = new BookInventory();
        $bookInventory->setBookId($bkId);
        $bookInventory->setQtyOnHand($qtyOnHand);
        $bookInventory->setQtySold(0);
        $biController->save($bookInventory);
    }

}