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
    private $shipment_date;

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

    public function getShipmentDate()
    {
        return $this->shipment_date;
    }

    public function setShipmentDate($shipment_date)
    {
        $this->shipment_date = $shipment_date;
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