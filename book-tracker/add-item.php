<?php
    // get user input
    $itemName = filter_input(INPUT_POST, 'item-name');
    $itemType = filter_input(INPUT_POST, 'item-type');
    $columnName = filter_input(INPUT_POST, 'column-name');
    $formattedName = filter_input(INPUT_POST, 'formatted-name');

    // validate user input
    $errorMessage = '';
    if ($itemName == NULL) {
        $errorMessage = $errorMessage . '<p><?php echo($itemType); ?> Name is a required field.</p>';
    }
    if ($errorMessage != '') {
        include('error-page.php');
    } else {
        include('database.php');

        // check if genre is in database
        $query = "SELECT * FROM $itemType  WHERE $columnName = :itemName;";
        $statement = $db->prepare($query);
        $statement->bindValue(':itemName', $itemName);
        $statement->execute();
        $itemArray = $statement->fetch();
        $statement->closeCursor();
        if ($itemArray == false) {
            // if not, add to database
            $query = "INSERT INTO $itemType ($columnName)
                VALUES (:itemName);";
            $statement = $db->prepare($query);
            $statement->bindValue(':itemName', $itemName);
            $statement->execute();
            $statement->closeCursor();

            // return to the original page
            $url = "view-list.php?list-name=$itemType&formatted-name=$formattedName";
            header("Location: $url");
        } else {
            // if genre already exists, inform user
            $errorMessage = '<p>The ' . $itemName . ' ' . strtolower($formattedName) . ' already exists.</p>';
            include('error-page.php');
        }
    }
?>