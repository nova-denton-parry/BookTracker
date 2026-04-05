<?php

    // get book id
    $id = filter_input(INPUT_POST, 'book-id');

    // get user input
    $title = filter_input(INPUT_POST, 'title');
    $author = filter_input(INPUT_POST, 'author');
    $genre = filter_input(INPUT_POST, 'genre');
    $status = filter_input(INPUT_POST, 'status');
    $format = filter_input(INPUT_POST, 'format');
    $source = filter_input(INPUT_POST, 'source');
    $rating = filter_input(INPUT_POST, 'rating', FILTER_VALIDATE_INT);
    $comments = filter_input(INPUT_POST, 'comments');

    // validate user input
    $errorMessage = '';
    if ($title == NULL) {
        $errorMessage = $errorMessage . '<p>Title is a required field.</p>';
    }
    if ($author == NULL) {
        $errorMessage = $errorMessage . '<p>Author is a required field.</p>';
    }
    if ($genre == NULL) {
        $errorMessage = $errorMessage . '<p>Genre is a required field.</p>';
    }
    if ($status == NULL) {
        $errorMessage = $errorMessage . '<p>Status is a required field.</p>';
    }
    if ($rating < 0 || $rating > 10) {
        $errorMessage = $errorMessage . '<p>Rating must be between 0 and 10.</p>';
    }
    if ($errorMessage != '') {
        include('error-page.php');
    } else {
        include('database.php');

        // check if author is in database
        $query = 'SELECT :author FROM authors;';
        $statement = $db->prepare($query);
        $statement->bindValue(':author', $author);
        $statement->execute();
        $authorArray = $statement->fetch();
        $statement->closeCursor();
        if (!array_key_exists('author_name', $authorArray)) {
            // if author is not in database, add it
            $query = 'INSERT INTO authors (author_name)
                VALUES (:author);';
            $statement = $db->prepare($query);
            $statement->bindValue(':author', $author);
            $statement->execute();
            $statement->closeCursor();
        }

        // update database entry
        $query = 'UPDATE books
                SET
                    title = :title,
                    author = :author,
                    genre = :genre,
                    status = :status,
                    rating = :rating,
                    format = :format,
                    source = :source,
                    comments = :comments
                WHERE book_id = :id';
        $statement = $db->prepare($query);
        $statement->bindValue(':title', $title);
        $statement->bindValue(':author', $author);
        $statement->bindValue(':genre', $genre);
        $statement->bindValue(':status', $status);
        $statement->bindValue(':rating', $rating);
        $statement->bindValue(':format', $format);
        $statement->bindValue(':source', $source);
        $statement->bindValue(':comments', $comments);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $statement->closeCursor();

        // return to the original page
        // return to original page
        $url = "view-book-details.php?book_id=$id";
        header("Location: $url");
    }

?>