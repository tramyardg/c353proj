<?php

class OrderItem implements JsonSerializable
{

    private $order_item_id;
    private $order_id;
    private $book_id;
    private $quantity;
    private $total_amount;

    public function getOrderItemId()
    {
        return $this->order_item_id;
    }

    public function setOrderItemId($order_item_id): void
    {
        $this->order_item_id = $order_item_id;
    }

    public function getOrderId()
    {
        return $this->order_id;
    }

    public function setOrderId($order_id): void
    {
        $this->order_id = $order_id;
    }

    public function getBookId()
    {
        return $this->book_id;
    }

    public function setBookId($book_id): void
    {
        $this->book_id = $book_id;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function setQuantity($quantity): void
    {
        $this->quantity = $quantity;
    }

    public function getTotalAmount()
    {
        return $this->total_amount;
    }

    public function setTotalAmount($total_amount): void
    {
        $this->total_amount = $total_amount;
    }

    /**
     * Specify data which should be serialized to JSON
     * @link https://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}