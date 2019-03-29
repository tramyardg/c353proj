<?php

class PublisherController
{
    public function __construct()
    {
    }

    public function fetchPublishers()
    {
        $sql = "SELECT * FROM publishers;";
        $stmt = DB::getInstance()->prepare($sql);
        $stmt->execute();
        return json_encode($stmt->fetchAll(PDO::FETCH_CLASS, "Publisher"), JSON_PRETTY_PRINT);
    }

    public function fetchPublisherById($id)
    {
        $sql = "SELECT * FROM publishers WHERE publisher_id = ?;";
        $stmt = DB::getInstance()->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetchAll(PDO::FETCH_CLASS, "Publisher");
    }
}