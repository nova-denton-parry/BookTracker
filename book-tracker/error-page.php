<?php
    include('template.php');
    echo($head_and_header);
?>
    <main class='center'>
        <h2>Error</h2>
        <?php echo $errorMessage; ?>

        <a href='index.php'><button class='button center-button'>Book List</button></a>
    </main>
<?php echo($footer_and_closing_tags); ?>