<?php
$commonNameTitle = parse_ini_file("./common.ini");
require 'db/DB.php';
require 'model/Customer.php';
require 'model/Order.php';
require 'controller/OrderController.php';

ob_start();
session_start();
if (isset($_SESSION["customer"])) {
    $customer = $_SESSION["customer"];
} else {
    header('Location: index.php?indexActive=true');
}

$orderController = new OrderController();
$orders = $orderController->fetchByCustomerId($customer->getCustomerId());
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Home</title>

    <link href="css/bootstrap-pulse.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet">
    <link href="css/navbar.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.5/css/select.dataTables.min.css">
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
</head>
<body>
    <?php include 'view/customer/navbar.php' ?>
    <main class="container">
        <div class="row">
            <div class="col">
                <h3>My Order History</h3>
                <?php if (sizeof($orders) == 0) { ?>
                    You do not have any orders currently
                <?php } else { ?>
                    <table class="table">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">Order Id</th>
                            <th scope="col">Book Title</th>
                            <th scope="col">Status</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Order Date</th>
                            <th scope="col">Date Received</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php // foreach($orders as $key=>$value): ?>
                        <tr>
                            <th scope="row"><?php // echo $orders[$key]["order_id"]; ?></th>
                            <td><?php // echo $orders[$key]["status"]; ?></td>
                            <td><?php // echo $orders[$key]["status"]; ?></td>
                            <td><?php // echo $orders[$key]["status"]; ?></td>
                            <td><?php // echo $orders[$key]["title"]; ?></td>
                            <td><?php // echo $orders[$key]["quantity"]; ?></td>
                        </tr>
                        <?php // endforeach; ?>
                        </tbody>
                    </table>
                <?php } ?>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h3>Requested Orders</h3>
                <table class="table">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">Order Id</th>
                        <th scope="col">Book Title</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Availability</th>
                        <th scope="col">Request Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php // foreach($orders as $key=>$value): ?>
                    <tr>
                        <th scope="row"><?php // echo $orders[$key]["order_id"]; ?></th>
                        <td><?php // echo $orders[$key]["status"]; ?></td>
                        <td><?php // echo $orders[$key]["status"]; ?></td>
                        <td><?php // echo $orders[$key]["status"]; ?></td>
                        <td><?php // echo $orders[$key]["title"]; ?></td>
                        <td><?php // echo $orders[$key]["quantity"]; ?></td>
                    </tr>
                    <?php // endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>