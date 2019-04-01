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
        // insert 0 quantity in bookstore inventory
        $bookInventory->setQtyOnHand(0);
        $bookInventory->setQtySold(0);
        $biController->save($bookInventory);

        // todo insert into publisher book inventory
    }

}