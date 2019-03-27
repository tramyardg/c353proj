<?php


class BookController
{
    public function __construct()
    {
    }

    public function fetchBooks()
    {
        $sql = "SELECT * FROM books;";
        $stmt = DB::getInstance()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS,
            "Book");
    }

    public function fetchBookById($id)
    {
        $sql = "SELECT * FROM books WHERE book_id = ?;";
        $stmt = DB::getInstance()->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetchAll(PDO::FETCH_CLASS,
            "Book");
    }

    public function fetchBookByCategory($n)
    {
        $sql = "SELECT * FROM books WHERE category = ?;";
        $stmt = DB::getInstance()->prepare($sql);
        $stmt->execute([$n]);
        return $stmt->fetchAll(PDO::FETCH_CLASS,
            "Book");
    }

    public function save(Book $book)
    {
        $sql = 'INSERT INTO `books` (`isbn`, `title`, `edition`, `price`, `publisher_id`, `image`, `category`) VALUES (?, ?, ?, ?, ?, ?, ?)';
        $stmt = DB::getInstance()->prepare($sql);
        $exec = $stmt->execute(
            array(
                $book->getIsbn(),
                $book->getTitle(),
                $book->getEdition(),
                $book->getPrice(),
                $book->getPublisherId(),
                $book->getImage(),
                $book->getCategory()
            )
        );
        echo json_encode(array('result' => $exec));
    }
}