<?php
$commonNameTitle = parse_ini_file("./common.ini");
require 'db/DB.php';
require 'model/Enum.php';
require 'controller/BookController.php';
require 'model/Book.php';

ob_start();
session_start();
if (isset($_SESSION["employee"])) {
    $employee = $_SESSION["employee"];
    // print_r($employee);

}/* else {
    header("Location: index.php");
}*/
// Once employee login implemented add this into if statement
$bkController = new BookController();
$books = $bkController->fetchBooks();
$book = new Book();
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
    <link rel="stylesheet" href="https:////cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
</head>
<body>
<?php //print_r(json_encode($aController->fetchAuthors())); ?>
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light rounded">
        <a class="navbar-brand" href="#"><?php echo $commonNameTitle['siteName']; ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample09"
                aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample09">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="employee-index.php">Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="employee-book-function.php">Book <span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <ul class="nav my-2 my-md-0">
                <li class="dropdown">
                    <?php if (isset($_SESSION["employee"])) { ?>
                        <a class="nav-link pl-0 dropdown-toggle" href="#" id="dropdown09" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">Hello, Employee</a>
                    <?php } else { ?>
                        <a class="nav-link pl-0 dropdown-toggle" href="#" id="dropdown09" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">Hello, Sign in</a>
                    <?php } ?>
                    <div class="dropdown-menu">
                        <?php if (isset($_SESSION["employee"])) { ?>
                            <a class="dropdown-item btn-success" href="#"><i class="mr-2" data-feather="user-check"></i>Your
                                account</a>
                        <?php } ?>
                        <?php if (!isset($_SESSION["employee"])) { ?>
                            <a class="dropdown-item" href="login.php"><i class="mr-2" data-feather="log-in"></i>Log
                                in</a>
                        <?php } ?>
                        <?php if (isset($_SESSION["employee"])) { ?>
                            <a class="dropdown-item" href="logout.php"><i class="mr-2" data-feather="log-out"></i>Log
                                out</a>
                        <?php } ?>
                        <?php if (!isset($_SESSION["employee"])) { ?>
                            <a class="dropdown-item" href="create-account.php"><i class="mr-2"
                                                                                  data-feather="user-plus"></i>Register</a>
                        <?php } ?>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <?php include 'view/employee/book-tab-list.php' ?>
    <div class="tab-content pt-2" id="myTabContent">
        <!-- Books Ordered -->
        <?php include 'view/employee/book/books-ordered.php' ?>
        <!-- Employee ordering books tab -->
        <?php include 'view/employee/book/order-book.php' ?>
        <!-- Add books tab -->
        <?php include 'view/employee/book/add-book.php' ?>
    </div>
    <script>
        $(document).ready(function () {
            $('#booksOrderedTable').DataTable({
                'pageLength': 5
            });
        });
        (function () {
            $.get("service/fetch.php?authors=all", function (data) {
                let authors = JSON.parse(data);
                for (let i = 0; i < authors.length; i++) {
                    let middleName = '';
                    if (authors[i].middle_name !== null) {
                        middleName = authors[i].middle_name
                    }
                    $('#authorsSelect').append('<option value="' + authors[i].author_id + '">' +
                        authors[i].first_name + ' ' +
                        middleName + ' ' +
                        authors[i].last_name +
                        '</option>');
                }
            });
            $.get("service/fetch.php?publishers=all", function (data) {
                let publishers = JSON.parse(data);
                for (let i = 0; i < publishers.length; i++) {
                    $('#publishersSelect').append('<option value="' + publishers[i].publisher_id + '">' +
                        publishers[i].publisher_id + ' ' +
                        publishers[i].company_name + ' ' +
                        '</option>');
                }
            });
        })();
    </script>
</body>
</html>
