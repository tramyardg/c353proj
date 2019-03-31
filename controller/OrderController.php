<?php

class OrderController
{
    public function __construct()
    {
    }

    public function fetchByCustomerId($customer_id) {
        $sql = "SELECT * 
                FROM `orders` 
                LEFT JOIN `order_items` 
                    ON orders.order_id = order_items.order_id 
                LEFT JOIN `books`
                    ON order_items.book_id = books.book_id
                WHERE orders.customer_id = ? 
                GROUP BY orders.order_id;";
        $stmt = DB::getInstance()->prepare($sql);
        $stmt->execute([$customer_id]);
        return $stmt->fetchAll();
    }

    /*
     *  Save order and return the inserted row id
     */
    public function save(Order $order)
    {
        $sql = 'INSERT INTO `orders` (`customer_id`, `status`) VALUES (?, ?)';
        $stmt = DB::getInstance()->prepare($sql);
        $exec = $stmt->execute(
            array(
                $order->getCustomerId(),
                $order->getStatus()
            )
        );

        $id = DB::getInstance()->lastInsertId();
        return json_encode(array('result' => $id));
    }
}
?>