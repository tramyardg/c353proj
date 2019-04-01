<?php

/*
 * An employee can receive a shipment of books from the publisher.
 * In addition to the employee and the publisher's information, each
 * shipment includes the date of the shipment, the books received and
 * the quantity of each book received.
 */

class Shipment implements JsonSerializable
{
    private $shipment_id;
    private $book_id;
    private $publisher_id;
    private $qty_ordered;
    private $status;
    private $date_requested;
    private $date_received;

    /**
     * @return mixed
     */
    public function getShipmentId()
    {
        return $this->shipment_id;
    }

    /**
     * @param mixed $shipment_id
     */
    public function setShipmentId($shipment_id): void
    {
        $this->shipment_id = $shipment_id;
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
    public function getDateReceived()
    {
        return $this->date_received;
    }

    /**
     * @param mixed $date_received
     */
    public function setDateReceived($date_received): void
    {
        $this->date_received = $date_received;
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