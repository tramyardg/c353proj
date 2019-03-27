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
                WHERE ba.author_id = a.author_id AND ba.book_id = ?;';
        $stmt = DB::getInstance()->prepare($sql);
        $stmt->execute([$id]);

        // returns an array of authors object
        return $stmt->fetchAll(PDO::FETCH_CLASS, "Author");
    }

    public function viewAuthors($bookId)
    {
        $authorsOfThisBook = null;
        $authors = $this->getAuthorsByBookId($bookId);
        $out = null;
        foreach ($authors as $v) {
            $authorsOfThisBook[] = $v;
        }

        $names = null;
        for ($i = 0; $i < count($authorsOfThisBook); $i++)
        {
            $a = new Author();
            $a = $authorsOfThisBook[$i];
            $names[] = $a->getFirstName() . ' ' . $a->getMiddleName() . ' ' . $a->getLastName();
        }
        return implode(', ', $names);
    }
}