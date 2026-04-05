<?php

    // get info from the database
    include('database.php');
    include('database-func.php');
    $queryAllBooks = 'SELECT * FROM books;';
    $allBooksArray = simpleQueryDB($queryAllBooks);

    // display template
    include('template.php');
    echo($head_and_header);

?>

<main>
    <table class='full-book-list'>
        <tr>
            <th>Title</th>
            <th>Author</th>
            <th>Genre</th>
            <th>Status</th>
            <th></th>
            <th></th>
        </tr>

        <?php foreach ($allBooksArray as $book): ?>
            <tr>
                <td><?php echo $book['title']; ?></td>
                <td><?php echo $book['author']; ?></td>
                <td><?php echo $book['genre']; ?></td>
                <td><?php echo $book['status']; ?></td>
                <td><form action='view-book-details.php' method='get'>
                    <input type='hidden' name='book_id'
                           value='<?php echo $book['book_id']; ?>'>
                    <input class='button' type='submit' value='View Details'>
                </form></td>
                <td><form action='delete-book.php' method='post'
                    onsubmit="return confirm('Are you sure you want to delete the <?php echo($book['title']); ?> book?');">
                    <input type='hidden' name='book_id'
                           value='<?php echo $book['book_id']; ?>'>
                    <input class='button' type='submit' value='Delete'>
                </form></td>
        </tr>
        <?php endforeach; ?>
    </table>
</main>

<?php echo($footer_and_closing_tags); ?>