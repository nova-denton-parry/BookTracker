<?php

    // get book info
    $id = filter_input(INPUT_POST, 'book-id');

    include('database.php');
    $query = "SELECT * FROM books WHERE book_id = :id";
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->execute();
    $bookArray = $statement->fetch();
    $statement->closeCursor();

    include('misc-func.php');

    include('template.php');
    echo($head_and_header);

?>

<form action='edit-book.php' method='post'>

    <div class='two-col-grid'>

        <input type='hidden' name='book-id' value='<?php echo($id); ?>'>

        <label for='title'>Title:</label>
        <input type='text' name='title' id='title' value='<?php echo($bookArray['title']); ?>'>

        <label for='author'>Author:</label>
        <input type='text' name='author' id='author' value='<?php echo($bookArray['author']); ?>'>

        <label for='genre'>Genre:</label>
        <select name='genre' id='genre'>
            <?php createOptionsWithDefault($allGenresArray, 'genre_name', $bookArray['genre']); ?>
        </select>

        <label for='status'>Status:</label>
        <select name='status' id='status'>
            <?php createOptionsWithDefault($allStatusesArray, 'status_name', $bookArray['status']); ?>
        </select>

        <label for='format'>Format:</label>
        <select name='format' id='format'>
            <?php createOptionsWithDefault($allFormatsArray, 'format_name', $bookArray['format']); ?>
        </select>

        <label for='source'>Source:</label>
        <select name='source' id='source'>
            <?php createOptionsWithDefault($allSourcesArray, 'source_name', $bookArray['source']); ?>
        </select>

        <label for='rating'>Rating:</label>
        <select name='rating' id='rating'>
            <option value='NULL'></option>
            <?php for($i = 0; $i <= 10; $i++) {
                if ($i == $bookArray['rating']) {
                    ?><option value='<?php echo($i) ?>' selected><?php echo($i); ?></option>
                <?php } else {
                ?><option value='<?php echo($i) ?>'><?php echo($i); ?></option>
            <?php }}; ?>
        </select>

        <label for='comments'>Comments:</label>
        <textarea name='comments' id='comments'><?php echo($bookArray['comments']); ?></textarea>

        <input class='button' type='submit' value='Update Book'>
    
    </div>

</form>



<a class='button center-button' href='view-book-details.php?book_id=<?php echo($id); ?>'>Return to Book Details</a>

<?php echo($footer_and_closing_tags); ?>