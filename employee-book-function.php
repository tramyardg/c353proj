<?php
$commonNameTitle = parse_ini_file("./common.ini");
require 'db/DB.php';
require 'model/Employee.php';
require 'controller/EmployeeController.php';

ob_start();
session_start();

$employee = new Employee();

if (isset($_SESSION["employee"])) {
    $employee = $_SESSION["employee"];
} else {
    header("Location: index.php");
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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.5/css/select.dataTables.min.css">
    <link rel="stylesheet" href="https:////cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>

</head>
<body>
<div class="container">
    <div class="d-none"><input type="hidden" id="employee-input" value="<?php echo $employee->getEmpId(); ?>"></div>
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
                    <a class="nav-link" href="employee-book-function.php">Book <span
                                class="sr-only">(current)</span></a>
                </li>
            </ul>
            <ul class="nav my-2 my-md-0">
                <li class="dropdown">
                    <?php if (isset($_SESSION["employee"])) { ?>
                        <a class="nav-link pl-0 dropdown-toggle" href="#" id="dropdown09" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">Hello, <?php echo $employee->getEmpName(); ?></a>
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
    <?php include 'view/employee/book-tab-list.php' ?>
    <div class="tab-content pt-2">
        <!-- Books Ordered -->
        <?php include 'view/employee/book/books-ordered.php' ?>
        <!-- Employee ordering books tab -->
        <?php include 'view/employee/book/order-book.php' ?>
        <!-- Add books tab -->
        <?php include 'view/employee/book/add-book.php' ?>
    </div>
    <script>
        feather.replace();
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

    <script src="js/employee-book-features.js"></script>
    <script>
        $(document).ready(function () {
            initializeBooksOrderedTable();
            generateAuthorOptions();
            generatePublisherOptions();
        });
    </script>
</body>
</html>
