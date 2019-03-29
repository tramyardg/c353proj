<?php
$commonNameTitle = parse_ini_file("./common.ini");
require 'db/DB.php';
require 'model/Customer.php';
require 'model/Book.php';
require 'controller/BookController.php';

require 'model/Enum.php';
require 'model/BookCategory.php';

require 'model/Author.php';
require 'controller/AuthorController.php';

$bkController = new BookController();
$books = $bkController->fetchBooks();

$biographies = $bkController->fetchBookByCategory(BookCategory::Biography);
$biography = new Book();

$fictions = $bkController->fetchBookByCategory(BookCategory::Fiction);
$fiction = new Book();

$histories = $bkController->fetchBookByCategory(BookCategory::History);
$history = new Book();

$mysteries = $bkController->fetchBookByCategory(BookCategory::Mystery);
$mystery = new Book();

$suspenseBooks = $bkController->fetchBookByCategory(BookCategory::Suspense);
$suspense = new Book();

$thrillers = $bkController->fetchBookByCategory(BookCategory::Thriller);
$thriller = new Book();


///////////////////////////////////
$atController = new AuthorController();

ob_start();
session_start();
$customer = new Customer();
if (isset($_SESSION["customer"])) {
    $customer = $_SESSION["customer"];
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Home</title>

    <link href="css/bootstrap-flatly.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet">
    <link href="css/navbar.css" rel="stylesheet">
    <link href="css/vertical-tab.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.5/css/select.dataTables.min.css">

    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light rounded">
        <a class="navbar-brand" href="#"><?php echo $commonNameTitle['siteName']; ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample09"
                aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample09">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <ul class="nav my-2 my-md-0">
                <li class="dropdown">
                    <?php if (isset($_SESSION["customer"])) { ?>
                    <a class="nav-link pl-0 dropdown-toggle" href="#" id="dropdown09" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">Hello, <?php echo $customer->getCustomerName(); ?></a>
                    <?php } else { ?>
                    <a class="nav-link pl-0 dropdown-toggle" href="#" id="dropdown09" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">Hello, Sign in</a>
                    <?php } ?>
                    <div class="dropdown-menu">
                        <?php if (isset($_SESSION["customer"])) { ?>
                        <a class="dropdown-item btn-success" href="#"><i class="mr-2" data-feather="user-check"></i>Your
                            account</a>
                        <?php } ?>
                        <a class="dropdown-item" href="#"><i class="mr-2" data-feather="shopping-cart"></i>Cart</a>
                        <?php if (!isset($_SESSION["customer"])) { ?>
                        <a class="dropdown-item" href="login.php"><i class="mr-2" data-feather="log-in"></i>Log in</a>
                        <?php } ?>
                        <?php if (isset($_SESSION["customer"])) { ?>
                        <a class="dropdown-item" href="logout.php"><i class="mr-2" data-feather="log-out"></i>Log
                            out</a>
                        <?php } ?>
                        <?php if (!isset($_SESSION["customer"])) { ?>
                        <a class="dropdown-item" href="create-account.php"><i class="mr-2" data-feather="user-plus"></i>Register</a>
                        <?php } ?>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <main class="container-fluid">
        <div class="row">
            <!-- All the filters are in here -->
            <div class="col-3">
                <div class="filter-container">
                    <label for="category-filter">Categories</label>
                    <select id="category-filter" class="custom-select" onchange="filterChange()">
                        <option value="-1" selected>All</option>
                        <option value="0">0 (change these numbers to corespondidng category tag)</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">4</option>
                    </select>
                </div>

                <div class="filter-container">
                    <label for="inventory-filter">Availability</label>
                    <select id="inventory-filter" class="custom-select" onchange="filterChange()">
                        <option value="-1" selected>All</option>
                        <option value="0">Out of Stock</option>
                        <option value="1">In Stock</option>
                    </select>
                </div>
            </div>
            <!-- Each book gets appended in here -->
            <div id="book-container" class="col book-container">
            </div>
        </div>
    </main>
<script>
    feather.replace();
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/select/1.2.5/js/dataTables.select.min.js"></script>
<script src="js/vertical-tabs.js"></script>
<script src="js/client-index.js"></script>
<script>
    $(document).ready(() => {
        let books = <?php echo json_encode($bkController->fetchBooks()); ?>;
        console.log(books);
        initializeBooks(books);
    })
</script>
</body>
</html>