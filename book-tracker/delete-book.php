<?php
    include('database.php');

    // get book id
    $book_id = filter_input(INPUT_POST, 'book_id', FILTER_VALIDATE_INT);

    // Delete the product from the database
    if ($book_id != FALSE) {
        $query = 'DELETE FROM books
                WHERE book_id = :book_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':book_id', $book_id);
        $success = $statement->execute();
        $statement->closeCursor();    
    }

    // return to main page
    include('index.php');
?>