<?php
require '../controller/OrderController.php';
require '../controller/OrderItemController.php';
require '../model/OrderItem.php';
require '../model/Order.php';
require '../db/DB.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) {
    $customerId = $_POST["customer_id"];
    $bookId = $_POST["book_id"];
    $quantity = $_POST["quantity"];
    $price = $_POST["price"];
    $status = "pending";
    $order = new Order();
    $order->setCustomerId($customerId);
    $order->setStatus($status);

    $response = [
        'status' => false,
        'message' => 'There was a problem when trying to save order',
        'data' => []
    ];

    // this works, just that i am not getting the order ID back
    $orderController = new OrderController();
    $orderData = $orderController->save($order);
    $orderResponse = json_decode($orderData);
    $orderId = $orderResponse->result;
    
    if ($orderResponse->result) {
        // insert into orderItem
        $orderItem = new OrderItem();
        $orderItem->setOrderId($orderId);
        $orderItem->setBookId($bookId);
        $orderItem->setQuantity($quantity);
        $orderItem->setPrice($price);

        $orderItemController = new OrderItemController();
        $orderItemData = $orderItemController->save($orderItem);
        $orderItemResponse = json_decode($orderItemData);
        if ($orderItemData) {
            $response = [
                'status' => true,
                'message' => 'success',
                'data' => [$orderId]
            ];
        }
    }
   
    echo json_encode($response);
}
?>