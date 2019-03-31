<?php

class OrderController
{
    public function __construct()
    {
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