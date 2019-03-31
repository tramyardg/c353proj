<?php
require '../db/DB.php';
require '../model/Author.php';
require '../model/Book.php';
require '../model/Publisher.php';
require '../model/BookInventory.php';

require '../controller/AuthorController.php';
require '../controller/PublisherController.php';
require '../controller/BookInventoryController.php';

$aController = new AuthorController();
$pbController = new PublisherController();
$bkController = new BookController();
$baController = new BookAuthorsController();
$biController = new BookInventoryController();

if (isset($_GET["publisherId"])) {
    if (isset($_GET['publishers']) && $_GET['publishers'] == "byId") {
        echo json_encode($bkController->fetchBookByPublisherId($_GET["publisherId"]), JSON_PRETTY_PRINT);
    }

    // add new book
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['addBookData'])) {
        print_r($_POST['addBookData']);

        $newBook = new Book();

        $newBook->setIsbn($_POST['isbn']);
        $newBook->setTitle($_POST['title']);
        $newBook->setEdition($_POST['edition']);
        $newBook->setPrice($_POST['price']);
        $newBook->setCategory($_POST['category']);
        $newBook->setPublisherId($_POST['publisherId']);
        $newBook->setImage($_POST['image']);
        $bkController->save($newBook);

        // get all the authors and insert it to book authors table
        // one book can have many authors

        $authorsId = $_POST['authorsId'];
        for ($i = 0; $i < count($authorsId); $i++)
        {
            $bookAuthors = new BookAuthors();
            //$bookAuthors->setBookId();
            $bookAuthors->setAuthorId($authorsId[$i]);
            $baController->save($bookAuthors);
        }

        // insert to publisher book inventory as well with quantity
        $qtyOnHand = $_POST['quantity'];
        $bookInventory = new BookInventory();
        // $bookInventory->setBookId();
        $bookInventory->setQtyOnHand($qtyOnHand);
        $biController->save($bookInventory);
    }

}