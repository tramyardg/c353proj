<?php

class OrderItemController
{
    public function __construct()
    {
    }

    public function save(OrderItem $orderItem)
    {
        $sql = 'INSERT INTO `order_items` (`order_id`, `book_id`, `quantity`, `total_amount`) VALUES (?, ?, ?)';
        $stmt = DB::getInstance()->prepare($sql);
        $exec = $stmt->execute([
            $orderItem->getOrderId(),
            $orderItem->getBookId(),
            $orderItem->getQuantity(),
            $orderItem->getTotalAmount()
        ]);
        return json_encode(array('result' => $exec));
    }
}