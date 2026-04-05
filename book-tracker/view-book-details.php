<?php

    // get book id from url
    $book_id = filter_input(INPUT_GET, 'book_id', 
            FILTER_VALIDATE_INT);
    if ($book_id == NULL || $book_id == FALSE) {
        $book_id = 1;
    };

    // get the correct book from database
    include('database.php');
    $query = 'SELECT * FROM books WHERE book_id = :book_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':book_id', $book_id);
    $statement->execute();
    $book = $statement->fetch();
    $statement->closeCursor();

    // add header from template
    include('template.php');
    echo($head_and_header);
?>

<table class='book-details'>

    <tr>
        <th>Title</th>
        <td><?php echo($book['title']); ?></td>
    </tr>

    <tr>
        <th>Author</th>
        <td><?php echo($book['author']); ?></td>
    </tr>

    <tr>
        <th>Genre</th>
        <td><?php echo($book['genre']); ?></td>
    </tr>

    <tr>
        <th>Status</th>
        <td><?php echo($book['status']); ?></td>
    </tr>

    <tr>
        <th>Format</th>
        <td><?php echo($book['format']); ?></td>
    </tr>

    <tr>
        <th>Source</th>
        <td><?php echo($book['source']); ?></td>
    </tr>

    <tr>
        <th>Rating</th>
        <td><?php echo($book['rating']); ?></td>
    </tr>    

</table>

<div class='book-comment-div'>
    <h2>Comments:</h2>
    <p><?php echo($book['comments']); ?></p>
</div>

<form action='edit-book-form.php' method='post'>
    <input type='hidden' name='book-id' value='<?php echo($book_id) ?>'>
    <input class='button center-button' type='submit' value='Edit Book'>
</form>

<a class='button center-button' href='index.php'>Return to Book List</a>


<?php echo($footer_and_closing_tags); //add footer from template ?>