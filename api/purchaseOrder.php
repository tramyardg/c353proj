<?php

require '../db/DB.php';
require '../model/Order.php';
require '../model/OrderItem.php';
require '../controller/OrderController.php';
require '../controller/OrderItemController.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST) && isset($_POST['payload']))
{
    print_r($_POST['payload']);

    // todo insert to orders and order_items
}