<?php

class Order implements JsonSerializable
{
    private $order_id;
    private $customer_id;
    private $order_date;
    private $date_received;
    private $status;

    public function getOrderId()
    {
        return $this->order_id;
    }

    public function setOrderId($order_id): void
    {
        $this->order_id = $order_id;
    }

    public function getCustomerId()
    {
        return $this->customer_id;
    }

    public function setCustomerId($customer_id): void
    {
        $this->customer_id = $customer_id;
    }

    public function getOrderDate()
    {
        return $this->order_date;
    }

    public function setOrderDate($order_date): void
    {
        $this->order_date = $order_date;
    }

    public function getDateReceived()
    {
        return $this->date_received;
    }

    public function setDateReceived($date_received): void
    {
        $this->date_received = $date_received;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status): void
    {
        $this->status = $status;
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