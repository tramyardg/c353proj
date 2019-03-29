<?php

class BookInventory
{
    private $book_inv_id;
    private $book_id;
    private $qty_on_hand;
    private $qty_sold;

    public function getBookInvId()
    {
        return $this->book_inv_id;
    }

    public function setBookInvId($book_inv_id)
    {
        $this->book_inv_id = $book_inv_id;
    }

    public function getBookId()
    {
        return $this->book_id;
    }

    public function setBookId($book_id)
    {
        $this->book_id = $book_id;
    }

    public function getQtyOnHand()
    {
        return $this->qty_on_hand;
    }

    public function setQtyOnHand($qty_on_hand)
    {
        $this->qty_on_hand = qty_on_hand;
    }

    public function getQtySold()
    {
        return $this->qty_sold;
    }

    public function setQtySold($qty_sold)
    {
        $this->qty_sold = qty_sold;
    }

}
