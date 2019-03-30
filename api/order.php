<?php
require '../controller/OrderController.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) {
    $customerId = $_POST["customer_id"];
    $bookId = $_POST["book_id"];
    $quantity = $_POST["quantity"];
    $price = $_POST["price"];
    $status = "pending";
    // var_dump($customerId);
    // die();

    // this works, just that i am not getting the order ID back
    $orderController = new OrderController();
    $jsonResponse = $orderController->save($customerId, $status);
    $response = json_decode($jsonResponse);
    $orderId = $response->result;
    
    if ($response->result) {
        // insert into orderItem


        // once inserted, return order id so user can keep track of his order.

        // TODO ADD ORDER_ITEM

        $response = [
            'status' => true,
            'message' => 'success',
            'data' => [$orderId]
        ];
    } else {
        echo "FAIL";
    }
   
    echo json_encode($response);
}
?>