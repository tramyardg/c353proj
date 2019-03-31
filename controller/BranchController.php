<?php


class BranchController
{

    public function findParentPublisherById($id)
    {
        $sql = 'SELECT * FROM branches WHERE publisher_id = ?;';
        $stmt = DB::getInstance()->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetchAll(PDO::FETCH_CLASS, "PublisherBranch");
    }

}