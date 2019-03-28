<?php

class BookInventoryController
{

    public function __construct()
    {
    }

    public function fetchBookInventoryByBookId($id)
    {
        $sql = "SELECT * FROM books_inventory";
        $stmt = DB::getInstance()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS,
            "BookInventory");
    }

    public function addBookQtyByBookId($id, $qty)
    {
        $bkInventory = fetchBookInventoryByBookId($id);
        $bkInventory->setQtyOnHand($qty + $bkInventory->getQtyOnHand());
        update($bkInventory);
    }

    public function update(BookInventory $bkInventory){
        $sql = "UPDATE `books_inventory` SET `qty_on_hand` = $bkInventory->getQtyOnHand() WHERE `book_id` = $bkInventory->getBookId()";
        $stmt = DB::getInstance()->prepare($sql);
        $exec = $stmt->execute(
            array(
                $bkInventory->getBookInvId(),
                $bkInventory->getBookId(),
                $bkInventory->getQtyOnHand(),
                $bkInventory->getQtySold()
            )
        );
        echo json_encode(array('result' => $exec));
    }

}
