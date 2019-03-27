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
    <link href="css/navbar.css" rel="stylesheet">
    <link href="css/vertical-tab.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.5/css/select.dataTables.min.css">

    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
</head>
<body>
<?php $savedCartItems = $_COOKIE; ?>
<div class="container">
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
                        <a class="dropdown-item" href="#"><i class="mr-2" data-feather="shopping-cart"></i>
                            Cart
                            <span class="badge badge-info cart-counter"></span>
                        </a>
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

    <main role="main">
        <div class="tab">
            <button class="tablinks active"
                    onclick="openCategory(this, <?php echo "'". BookCategory::toString(0) . "Div'"; ?>)">
                <?php echo BookCategory::toString(0); ?>
            </button>
            <button class="tablinks"
                    onclick="openCategory(this, <?php echo "'". BookCategory::toString(1) . "Div'"; ?>)">
                <?php echo BookCategory::toString(1); ?>
            </button>
            <button class="tablinks"
                    onclick="openCategory(this, <?php echo "'". BookCategory::toString(2) . "Div'"; ?>)">
                <?php echo BookCategory::toString(2); ?>
            </button>
            <button class="tablinks"
                    onclick="openCategory(this, <?php echo "'". BookCategory::toString(3) . "Div'"; ?>)">
                <?php echo BookCategory::toString(3); ?>
            </button>
            <button class="tablinks"
                    onclick="openCategory(this, <?php echo "'". BookCategory::toString(4) . "Div'"; ?>)">
                <?php echo BookCategory::toString(4); ?>
            </button>
            <button class="tablinks"
                    onclick="openCategory(this, <?php echo "'". BookCategory::toString(5) . "Div'"; ?>)">
                <?php echo BookCategory::toString(5); ?>
            </button>
        </div>
        <div id="<?php echo BookCategory::toString(0); ?>Div" class="tabcontent">
            <table id="<?php echo BookCategory::toString(0); ?>Table" class="" style="width:100%">
                <thead>
                <tr>
                    <th scope="col"><?php echo BookCategory::toString(0); ?></th>
                    <th scope="col">Price</th>
                    <th scope="col">ISBN</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($biographies as $k => $v) { $biography = $v; ?>
                <tr>
                    <td>
                        <div class="row">
                            <div class="col-auto d-none d-lg-block">
                                <?php if (empty($biography->getImage())) { ?>
                                    <img alt="book image" src="https://via.placeholder.com/200x230/55595c/FFFFFF/?text=Coming%20Soon">
                                <?php } else { ?>
                                    <img alt="book image" src="https://via.placeholder.com/200x230/55595c/FFFFFF/?text=Coming%20Soon">
                                <?php } ?>
                            </div>
                            <div class="col d-flex p-0 flex-column">
                                <div class="col p-0">
                                    <h5 class="mb-0"><?php echo $biography->getTitle(); ?></h5>
                                    <strong class="d-inline-block mb-2 text-primary">by
                                        <?php echo $atController->viewAuthors($biography->getBookId()) ?></strong>
                                </div>
                                <div class="col p-0">
                                    <button type="button" class="btn btn-success btn-xs add-to-cart"
                                            data="<?php echo $biography->getBookId(); ?>" name="addToCart">Add to Cart</button>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="card-text mb-auto"><?php echo $biography->getPrice(); ?></span>
                    </td>
                    <td>
                        <span class="card-text mb-auto"><?php echo $biography->getIsbn(); ?></span>
                    </td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
        <div id="<?php echo BookCategory::toString(1); ?>Div" class="tabcontent d-none">
            <table id="<?php echo BookCategory::toString(1); ?>Table" class="" style="width:100%">
                <thead>
                <tr>
                    <th scope="col"><?php echo BookCategory::toString(1); ?></th>
                    <th scope="col">Price</th>
                    <th scope="col">ISBN</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($fictions as $k => $v) { $fiction = $v; ?>
                <tr>
                    <td>
                        <div class="row">
                            <div class="col-auto d-none d-lg-block">
                                <?php if (empty($fiction->getImage())) { ?>
                                <svg class="bd-placeholder-img" width="180" height="230"
                                     xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice"
                                     role="img" aria-label="Placeholder: Thumbnail"><title>
                                        Placeholder</title>
                                    <rect width="100%" height="100%" fill="#55595c"></rect>
                                    <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                                </svg>
                                <?php } else { ?>
                                <img alt="book image" src="https://via.placeholder.com/200x230/55595c/FFFFFF/?text=Coming%20Soon">
                                <?php } ?>
                            </div>
                            <div class="col p-4 d-flex flex-column position-static">
                                <h5 class="mb-0"><?php echo $fiction->getTitle(); ?></h5>
                                <strong class="d-inline-block mb-2 text-primary">by
                                    <?php echo $atController->viewAuthors($fiction->getBookId()) ?></strong>
                                <a href="#">Add to cart</a>
                            </div>
                        </div>
                    </td>
                    <td>
                        <p class="card-text mb-auto"><?php echo $fiction->getPrice(); ?></p>
                    </td>
                    <td>
                        <p class="card-text mb-auto"><?php echo $fiction->getIsbn(); ?></p>
                    </td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
        <div id="<?php echo BookCategory::toString(2); ?>Div" class="tabcontent d-none">
            <table id="<?php echo BookCategory::toString(2); ?>Table" class="" style="width:100%">
                <thead>
                <tr>
                    <th scope="col"><?php echo BookCategory::toString(2); ?></th>
                    <th scope="col">Price</th>
                    <th scope="col">ISBN</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($histories as $k => $v) { $history = $v; ?>
                    <tr>
                        <td>
                            <div class="row">
                                <div class="col-auto d-none d-lg-block">
                                    <?php if (empty($history->getImage())) { ?>
                                        <svg class="bd-placeholder-img" width="180" height="230"
                                             xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice"
                                             role="img" aria-label="Placeholder: Thumbnail"><title>
                                                Placeholder</title>
                                            <rect width="100%" height="100%" fill="#55595c"></rect>
                                            <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                                        </svg>
                                    <?php } else { ?>
                                        <img alt="book image" src="https://via.placeholder.com/200x230/55595c/FFFFFF/?text=Coming%20Soon">
                                    <?php } ?>
                                </div>
                                <div class="col p-4 d-flex flex-column position-static">
                                    <h5 class="mb-0"><?php echo $history->getTitle(); ?></h5>
                                    <strong class="d-inline-block mb-2 text-primary">by
                                        <?php echo $atController->viewAuthors($history->getBookId()) ?></strong>
                                    <a href="#">Add to cart</a>
                                </div>
                            </div>
                        </td>
                        <td>
                            <p class="card-text mb-auto"><?php echo $history->getPrice(); ?></p>
                        </td>
                        <td>
                            <p class="card-text mb-auto"><?php echo $history->getIsbn(); ?></p>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
        <div id="<?php echo BookCategory::toString(3); ?>Div" class="tabcontent d-none">
            <table id="<?php echo BookCategory::toString(3); ?>Table" class="" style="width:100%">
                <thead>
                <tr>
                    <th scope="col"><?php echo BookCategory::toString(3); ?></th>
                    <th scope="col">Price</th>
                    <th scope="col">ISBN</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($mysteries as $k => $v) { $mystery = $v; ?>
                    <tr>
                        <td>
                            <div class="row">
                                <div class="col-auto d-none d-lg-block">
                                    <?php if (empty($mystery->getImage())) { ?>
                                        <svg class="bd-placeholder-img" width="180" height="230"
                                             xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice"
                                             role="img" aria-label="Placeholder: Thumbnail"><title>
                                                Placeholder</title>
                                            <rect width="100%" height="100%" fill="#55595c"></rect>
                                            <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                                        </svg>
                                    <?php } else { ?>
                                        <img alt="book image" src="https://via.placeholder.com/200x230/55595c/FFFFFF/?text=Coming%20Soon">
                                    <?php } ?>
                                </div>
                                <div class="col p-4 d-flex flex-column position-static">
                                    <h5 class="mb-0"><?php echo $mystery->getTitle(); ?></h5>
                                    <strong class="d-inline-block mb-2 text-primary">by
                                        <?php echo $atController->viewAuthors($mystery->getBookId()) ?></strong>
                                    <a href="#">Add to cart</a>
                                </div>
                            </div>
                        </td>
                        <td>
                            <p class="card-text mb-auto"><?php echo $mystery->getPrice(); ?></p>
                        </td>
                        <td>
                            <p class="card-text mb-auto"><?php echo $mystery->getIsbn(); ?></p>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
        <div id="<?php echo BookCategory::toString(4); ?>Div" class="tabcontent d-none">
            <table id="<?php echo BookCategory::toString(4); ?>Table" class="" style="width:100%">
                <thead>
                <tr>
                    <th scope="col"><?php echo BookCategory::toString(4); ?></th>
                    <th scope="col">Price</th>
                    <th scope="col">ISBN</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($suspenseBooks as $k => $v) { $suspense = $v; ?>
                    <tr>
                        <td>
                            <div class="row">
                                <div class="col-auto d-none d-lg-block">
                                    <?php if (empty($suspense->getImage())) { ?>
                                        <svg class="bd-placeholder-img" width="180" height="230"
                                             xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice"
                                             role="img" aria-label="Placeholder: Thumbnail"><title>
                                                Placeholder</title>
                                            <rect width="100%" height="100%" fill="#55595c"></rect>
                                            <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                                        </svg>
                                    <?php } else { ?>
                                        <img alt="book image" src="https://via.placeholder.com/200x230/55595c/FFFFFF/?text=Coming%20Soon">
                                    <?php } ?>
                                </div>
                                <div class="col p-4 d-flex flex-column position-static">
                                    <h5 class="mb-0"><?php echo $suspense->getTitle(); ?></h5>
                                    <strong class="d-inline-block mb-2 text-primary">by
                                        <?php echo $atController->viewAuthors($suspense->getBookId()) ?></strong>
                                    <a href="#">Add to cart</a>
                                </div>
                            </div>
                        </td>
                        <td>
                            <p class="card-text mb-auto"><?php echo $suspense->getPrice(); ?></p>
                        </td>
                        <td>
                            <p class="card-text mb-auto"><?php echo $suspense->getIsbn(); ?></p>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
        <div id="<?php echo BookCategory::toString(5); ?>Div" class="tabcontent d-none">
            <table id="<?php echo BookCategory::toString(5); ?>Table" class="" style="width:100%">
                <thead>
                <tr>
                    <th scope="col"><?php echo BookCategory::toString(5); ?></th>
                    <th scope="col">Price</th>
                    <th scope="col">ISBN</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($thrillers as $k => $v) { $thriller = $v; ?>
                    <tr>
                        <td>
                            <div class="row">
                                <div class="col-auto d-none d-lg-block">
                                    <?php if (empty($thriller->getImage())) { ?>
                                        <svg class="bd-placeholder-img" width="180" height="230"
                                             xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice"
                                             role="img" aria-label="Placeholder: Thumbnail"><title>
                                                Placeholder</title>
                                            <rect width="100%" height="100%" fill="#55595c"></rect>
                                            <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                                        </svg>
                                    <?php } else { ?>
                                        <img alt="book image" src="https://via.placeholder.com/200x230/55595c/FFFFFF/?text=Coming%20Soon">
                                    <?php } ?>
                                </div>
                                <div class="col p-4 d-flex flex-column position-static">
                                    <h5 class="mb-0"><?php echo $thriller->getTitle(); ?></h5>
                                    <strong class="d-inline-block mb-2 text-primary">by
                                        <?php echo $atController->viewAuthors($thriller->getBookId()) ?></strong>
                                    <a href="#">Add to cart</a>
                                </div>
                            </div>
                        </td>
                        <td>
                            <p class="card-text mb-auto"><?php echo $thriller->getPrice(); ?></p>
                        </td>
                        <td>
                            <p class="card-text mb-auto"><?php echo $thriller->getIsbn(); ?></p>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </main>
</div>
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
<script src="js/add-to-cart.js"></script>
<script>
    $(document).ready(function () {
        $('table#BiographyTable, ' +
            'table#FictionTable, ' +
            'table#HistoryTable, ' +
            'table#SuspenseTable, ' +
            'table#MysteryTable, ' +
            'table#ThrillerTable' ).DataTable({
            'pageLength': 5
        });
    });
</script>
</body>
</html>