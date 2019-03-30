<?php
$commonNameTitle = parse_ini_file("./common.ini");
require 'db/DB.php';

require 'model/Enum.php';
require 'model/Book.php';
require 'model/Publisher.php';
require 'model/BookInventory.php';
require 'model/Shipment.php';

require 'controller/BookController.php';
require 'controller/BookInventoryController.php';
require 'controller/PublisherController.php';
require 'controller/ShipmentController.php';

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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.5/css/select.dataTables.min.css">

    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>

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
                <li class="nav-item active">
                    <a class="nav-link" href="employee-index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="employee-book-function.php">Book</a>
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
                            <a class="dropdown-item btn-success" href="#">
                                <i class="mr-2" data-feather="user-check"></i>
                                Your account
                            </a>
                        <?php } ?>
                        <?php if (!isset($_SESSION["employee"])) { ?>
                            <a class="dropdown-item" href="login.php">
                                <i class="mr-2" data-feather="log-in"></i>
                                Log in
                            </a>
                        <?php } ?>
                        <?php if (isset($_SESSION["employee"])) { ?>
                            <a class="dropdown-item" href="logout.php">
                                <i class="mr-2" data-feather="log-out"></i>
                                Log out
                            </a>
                        <?php } ?>
                        <?php if (!isset($_SESSION["employee"])) { ?>
                            <a class="dropdown-item" href="create-account.php">
                                <i class="mr-2" data-feather="user-plus"></i>
                                Register
                            </a>
                        <?php } ?>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <?php include 'view/employee/home-tab-list.php' ?>
    <div class="tab-content pt-2" id="homeTabContent">
        <!-- Receive books tab -->
        <?php include 'view/employee/home/receive-shipment.php' ?>
        <!-- Client orders tab -->
        <?php include 'view/employee/home/client-orders.php' ?>
    </div>
    <script>
        feather.replace();
    </script>
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
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.5/js/dataTables.select.min.js"></script>
    <script src="js/employee-index.js"></script>
    <script>
        $(document).ready(function () {
            $('#booksReceiveTable').DataTable({
                select: {style: 'multi'},
                columnDefs: [{"width": "25%", "targets": 2}],
                'pageLength': 10
            });
        });
    </script>
</body>
</html>
