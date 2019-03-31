<?php

class OrderItemController
{
    public function __construct()
    {
    }

    public function save(OrderItem $orderItem)
    {
        $sql = 'INSERT INTO `order_items` (`order_id`, `book_id`, `quantity`, `price`) VALUES (?, ?, ?, ?)';
        $stmt = DB::getInstance()->prepare($sql);
        $exec = $stmt->execute(
            array(
                $orderItem->getOrderId(),
                $orderItem->getBookId(),
                $orderItem->getQuantity(),
                $orderItem->getPrice()
            )
        );

        return json_encode(array('result' => $exec));
    }
}
?>