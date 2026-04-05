<?php

    // display template
    include('template.php');
    echo($head_and_header);

    include('misc-func.php');

?>

<form action='add-book.php' method='post'>

    <div class='two-col-grid'>

        <label for='title'>Title:</label>
        <input type='text' name='title' id='title'>

        <label for='author'>Author:</label>
        <input type='text' name='author' id='author'>

        <label for='genre'>Genre:</label>
        <select name='genre' id='genre'>
            <?php createOptions($allGenresArray, 'genre_name'); ?>
        </select>

        <label for='status'>Status:</label>
        <select name='status' id='status'>
            <?php createOptions($allStatusesArray, 'status_name'); ?>
        </select>

        <label for='format'>Format:</label>
        <select name='format' id='format'>
            <?php createOptions($allFormatsArray, 'format_name'); ?>
        </select>

        <label for='source'>Source:</label>
        <select name='source' id='source'>
            <?php createOptions($allSourcesArray, 'source_name'); ?>
        </select>

        <label for='rating'>Rating:</label>
        <select name='rating' id='rating'>
            <option value='NULL'></option>
            <?php for($i = 0; $i <= 10; $i++) {
                ?><option value='<?php echo($i) ?>'><?php echo($i); ?></option>
            <?php }; ?>
        </select>

        
        <label for='comments'>Comments:</label>
        <textarea name='comments' id='comments'></textarea>

        <input class='button' type='submit' value='Add Book'>
    
    </div>

</form>

<?php echo($footer_and_closing_tags); ?>