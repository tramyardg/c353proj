<?php
require '../db/DB.php';

class OrderController
{
    public function __construct()
    {
    }

    public function save($customerId, $status)
    {
        $sql = 'INSERT INTO `orders` (`customer_id`, `status`) VALUES (?, ?)';
        $stmt = DB::getInstance()->prepare($sql);
        $exec = $stmt->execute(
            array(
                $customerId,
                $status
            )
        );

        $id = DB::getInstance()->lastInsertId();
        return json_encode(array('result' => $id));
    }
}
?>