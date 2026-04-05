<?php

    $page_title = '';

    $head_and_header = 
        '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Book Database</title>
            <link rel=\'stylesheet\' href=\'styles.css\'>
        </head>
        <body>
        <header>
            <h1><a href=\'index.php\'/>Book Database</a></h1>
        </header>
        
        <nav>
            <form action=\'index.php\' method=\'get\'>
                <input type=\'submit\' value=\'Book List\'>
            </form>

            <span></span>

            <form action=\'add-book-form.php\' method=\'get\'>
                <input type=\'submit\' value=\'Add Book\'>
            </form>

            <span></span>

            <form action=\'view-list.php\' method=\'get\'>
                <input type=\'hidden\' name=\'list-name\' value=\'genres\'>
                <input type=\'hidden\' name=\'formatted-name\' value=\'Genre\'>
                <input type=\'submit\' value=\'View Genres\'>
            </form>

            <span></span>

            <form action=\'view-list.php\' method=\'get\'>
                <input type=\'hidden\' name=\'list-name\' value=\'authors\'>
                <input type=\'hidden\' name=\'formatted-name\' value=\'Author\'>
                <input type=\'submit\' value=\'View Authors\'>
            </form>

            <span></span>

            <form action=\'view-list.php\' method=\'get\'>
                <input type=\'hidden\' name=\'list-name\' value=\'sources\'>
                <input type=\'hidden\' name=\'formatted-name\' value=\'Source\'>
                <input type=\'submit\' value=\'View Sources\'>
            </form>

            <span></span>

            <form action=\'view-list.php\' method=\'get\'>
                <input type=\'hidden\' name=\'list-name\' value=\'formats\'>
                <input type=\'hidden\' name=\'formatted-name\' value=\'Format\'>
                <input type=\'submit\' value=\'View Formats\'>
            </form>
        </nav>';

        // to do: add recent changes page

    $footer_and_closing_tags = 
    '   <footer>
            <p>I made this :)</p>
        </footer>
    </body>
    </html>';

?>



    