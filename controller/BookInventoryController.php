<?php

class BookInventoryController
{

    public function __construct()
    {
    }

    public function updateByBookIdAndQtyReceived($bookId, $qtyReceived)
    {
        $sql = "UPDATE `books_inventory` SET `qty_on_hand` = `qty_on_hand` + ? WHERE `book_id` = ?;";
        $stmt = DB::getInstance()->prepare($sql);
        $exec = $stmt->execute([$qtyReceived, $bookId]);
        echo json_encode(array('result' => $exec));
    }

    public function save(BookInventory $inventory)
    {
        $sql = 'INSERT INTO `books_inventory` (`book_id`, `qty_on_hand`) VALUES (?, ?);';
        $stmt = DB::getInstance()->prepare($sql);
        $exec = $stmt->execute([$inventory->getBookId(), $inventory->getQtyOnHand()]);
        echo json_encode(['result' => $exec]);
    }

}
