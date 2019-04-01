<?php
$commonNameTitle = parse_ini_file("./common.ini");
require 'model/Customer.php';
require 'model/Order.php';
require 'controller/OrderController.php';
require 'db/DB.php';

ob_start();
session_start();
if (isset($_SESSION["customer"])) {
    $customer = $_SESSION["customer"];
} else {
    // redirect to home
    header('Location: ./index.php');
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

    <link href="css/bootstrap-flatly.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet">
    <link href="css/navbar.css" rel="stylesheet">
    <link href="css/vertical-tab.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.5/css/select.dataTables.min.css">
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
</head>
<body>
    <?php include './navbar.php' ?>
    <main class="container">
        <div class="row">
            <div class="col">
                <h3>My Orders</h3>
                  <?php if (sizeof($orders) == 0) { ?>
                    You do not have any orders currently
                  <?php } else { ?>
                    <table class="table">
                      <thead class="thead-light">
                        <tr>
                          <th scope="col">Order Id</th>
                          <th scope="col">Status</th>
                          <th scope="col">Book Title</th>
                          <th scope="col">Quantity</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php  foreach($orders as $key=>$value): ?>
                          <tr>
                            <th scope="row"><?php echo $orders[$key]["order_id"]; ?></th>
                            <td><?php echo $orders[$key]["status"]; ?></td>
                            <td><?php echo $orders[$key]["title"]; ?></td>
                            <td><?php echo $orders[$key]["quantity"]; ?></td>
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                    
                  <?php } ?>
                </form>
            </div>
        </div>
    </main>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
</body>
</html>