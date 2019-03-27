<?php

class AuthorController
{
    public function __construct()
    {
    }

    // get authors of a book given a book id
    public function getAuthorsByBookId($id)
    {
        $sql = 'SELECT first_name, middle_name, last_name, bio
                FROM authors a, books_authors ba
                WHERE ba.author_id = a.author_id AND ba.book_id = 1;';
        $stmt = DB::getInstance()->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetchAll(PDO::FETCH_CLASS, "Author");
    }
}