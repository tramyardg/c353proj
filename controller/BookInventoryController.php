<?php

class BookInventoryController
{

    public function __construct()
    {
    }

    public function fetchBookInventoryByBookId($id)
    {
        $sql = "SELECT * FROM books_inventory WHERE book_inv_id =?;";
        $stmt = DB::getInstance()->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetchAll(PDO::FETCH_CLASS, "BookInventory");
    }

    public function update(BookInventory $bkInventory)
    {
        $sql = "UPDATE `books_inventory` SET `qty_on_hand` = ? WHERE `book_id` = ?;";
        $stmt = DB::getInstance()->prepare($sql);
        // order follows '?' from $sql
        $exec = $stmt->execute([$bkInventory->getQtyOnHand(), $bkInventory->getBookId()]);
        echo json_encode(array('result' => $exec));
    }

    public function updateByBookIdAndQtyReceived($bookId, $qtyReceived)
    {
        $sql = "UPDATE `books_inventory` SET `qty_on_hand` = `qty_on_hand` + ? WHERE `book_id` = ?;";
        $stmt = DB::getInstance()->prepare($sql);
        $exec = $stmt->execute([$qtyReceived, $bookId]);
        echo json_encode(array('result' => $exec));
    }

}
