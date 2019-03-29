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

    // update handles this
    /*
    public function addBookQtyByBookId($id, $qty)
    {
        $bkInventory = fetchBookInventoryByBookId($id);
        $bkInventory->setQtyOnHand($qty + $bkInventory->getQtyOnHand());
        update($bkInventory);
    }
    */

    public function update(BookInventory $bkInventory){
        $sql = "UPDATE `books_inventory` SET `qty_on_hand` = ? WHERE book_inv_id = ? AND `book_id` = ?;";
        $stmt = DB::getInstance()->prepare($sql);
        $exec = $stmt->execute(
            array( // order follows ? from $sql
                $bkInventory->getQtyOnHand(),
                $bkInventory->getBookInvId(),
                $bkInventory->getBookId()
            )
        );
        echo json_encode(array('result' => $exec));
    }

}
