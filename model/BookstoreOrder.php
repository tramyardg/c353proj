<?php

class BookstoreOrder implements JsonSerializable
{
    private $bookstore_order_id;
    private $book_id;
    private $publisher_id;
    private $qty_ordered;
    private $status;
    private $date_requested;
    private $date_shipped;

    /**
     * @return mixed
     */
    public function getBookstoreOrderId()
    {
        return $this->bookstore_order_id;
    }

    /**
     * @param mixed $bookstore_order_id
     */
    public function setBookstoreOrderId($bookstore_order_id): void
    {
        $this->bookstore_order_id = $bookstore_order_id;
    }

    /**
     * @return mixed
     */
    public function getBookId()
    {
        return $this->book_id;
    }

    /**
     * @param mixed $book_id
     */
    public function setBookId($book_id): void
    {
        $this->book_id = $book_id;
    }

    /**
     * @return mixed
     */
    public function getPublisherId()
    {
        return $this->publisher_id;
    }

    /**
     * @param mixed $publisher_id
     */
    public function setPublisherId($publisher_id): void
    {
        $this->publisher_id = $publisher_id;
    }

    /**
     * @return mixed
     */
    public function getQtyOrdered()
    {
        return $this->qty_ordered;
    }

    /**
     * @param mixed $qty_ordered
     */
    public function setQtyOrdered($qty_ordered): void
    {
        $this->qty_ordered = $qty_ordered;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status): void
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getDateRequested()
    {
        return $this->date_requested;
    }

    /**
     * @param mixed $date_requested
     */
    public function setDateRequested($date_requested): void
    {
        $this->date_requested = $date_requested;
    }

    /**
     * @return mixed
     */
    public function getDateShipped()
    {
        return $this->date_shipped;
    }

    /**
     * @param mixed $date_shipped
     */
    public function setDateShipped($date_shipped): void
    {
        $this->date_shipped = $date_shipped;
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