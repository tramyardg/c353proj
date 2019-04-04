<?php
$commonNameTitle = parse_ini_file("./common.ini");
require 'model/Customer.php';
require 'model/Book.php';
require 'controller/BookController.php';

ob_start();
session_start();
if (isset($_SESSION["customer"])) {
    $customer = $_SESSION["customer"];
} else {
    // redirect to home
    header('Location: ./index.php');
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
    <?php include 'view/customer/navbar.php' ?>
    <main class="container">
        <div class="row">
            <div class="col">
                <h3>My Cart</h3>
                <form id="cart-form">
                    <hr>
                    <div class="row cart-row-header">
                        <div class="col-6 font-weight-bold">Book Title</div>
                        <div class="col-3 font-weight-bold">Price</div>
                        <div class="col-3 font-weight-bold">Quantity</div>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script>
        $(document).ready(() => {
            const cartItems = JSON.parse(localStorage.getItem("customer-cart")) || [];

            let priceTotal = [];
            cartItems.forEach((item) => {
                priceTotal.push(parseFloat(item.price));
                $("#cart-form").append(`<hr>
                    <div class="row cart-item-row">
                        <div class="col-6">${item.title}</div>
                        <div class="col-3 unit-price">$${item.price}</div>
                        <div class="col-3">
                            <input type="number" class="form-control" max="10" min="1"
                                value="${item.order_count}"
                                onchange="updateOrderPrice(this, ${item.price})"/>
                        </div>
                    </div>
                `);
            });
            $("#cart-form").append(`
                    <hr>
                    <div class="row">
                        <div class="col-6 font-weight-bold">Total</div>
                        <div class="col-3 font-weight-bold" id="total-price">$${arrSum(priceTotal)}</div>
                        <div class="col-3 font-weight-bold"></div>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-success">Purchase</button>
            `);
        });
    </script>
    <script src="js/util.js"></script>
    <script src="js/client-index.js"></script>
</body>
</html>