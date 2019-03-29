<?php

/*
 * An employee can receive a shipment of books from the publisher.
 * In addition to the employee and the publisher's information, each
 * shipment includes the date of the shipment, the books received and
 * the quantity of each book received.
 */

class Shipment implements JsonSerializable
{
    // joined books, publisher to get more details about books and publisher
    private $shipment_id;
    private $book_id;
    private $publisher_id;
    private $qty_to_receive;
    private $is_received;
    private $date_shipped;
    private $date_received;

    public function getIsReceived()
    {
        return $this->is_received;
    }

    public function setIsReceived($is_received): void
    {
        $this->is_received = $is_received;
    }

    public function getDateShipped()
    {
        return $this->date_shipped;
    }

    public function setDateShipped($date_shipped): void
    {
        $this->date_shipped = $date_shipped;
    }

    public function getDateReceived()
    {
        return $this->date_received;
    }

    public function setDateReceived($date_received): void
    {
        $this->date_received = $date_received;
    }

    public function getShipmentId()
    {
        return $this->shipment_id;
    }

    public function setShipmentId($shipment_id)
    {
        $this->shipment_id = $shipment_id;
    }

    public function getBookId()
    {
        return $this->book_id;
    }

    public function setBookId($book_id)
    {
        $this->book_id = $book_id;
    }

    public function getPublisherId()
    {
        return $this->publisher_id;
    }

    public function setPublisherId($publisher_id)
    {
        $this->publisher_id = $publisher_id;
    }

    public function getQtyToReceive()
    {
        return $this->qty_to_receive;
    }

    public function setQtyToReceive($qty_to_receive)
    {
        $this->qty_to_receive = $qty_to_receive;
    }

    /**
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}