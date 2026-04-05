<?php

    // get data from form
    $tableName = filter_input(INPUT_POST, 'table-name');
    $formattedName = filter_input(INPUT_POST, 'formatted-name');
    $id = filter_input(INPUT_POST, 'item-id');
    $newName = filter_input(INPUT_POST, 'item-name');

    $bookColumnName = strtolower($formattedName);
    $columnName = strtolower($formattedName) . '_name';
    $idName = strtolower($formattedName) . '_id';

    // validate user input
    $errorMessage = '';
    if ($newName == NULL || $newName == FALSE) {
        $errorMessage = 'Name is a required field.';
    }
    
    if ($errorMessage != '') {
        include('error-page.php');
    } else {
        include('database.php');

        // update related entries
        $updateRelatedQuery = "UPDATE books SET $bookColumnName = :newName 
            WHERE $bookColumnName = (SELECT $columnName FROM $tableName WHERE $idName = :id);";
        $updateStatement = $db->prepare($updateRelatedQuery);
        $updateStatement->bindValue(':newName', $newName);
        $updateStatement->bindValue(':id', $id);
        $updateStatement->execute();
        $updateStatement->closeCursor();

        // search database for existing entry
        $searchQuery = "SELECT * FROM $tableName WHERE $columnName = :newName;";
        $searchStatement = $db->prepare($searchQuery);
        $searchStatement->bindValue(':newName', $newName);
        $searchStatement->execute();
        $searchResult = $searchStatement->fetchAll();
        $searchStatement->closeCursor();
        if ($searchResult == FALSE) {
            // update database entry
            $updateQuery = "UPDATE $tableName SET $columnName = :newName WHERE $idName = :id;";
            $statement = $db->prepare($updateQuery);
            $statement->bindValue(':newName', $newName);
            $statement->bindValue(':id', $id);
            $statement->execute();
            $statement->closeCursor();
        } else {
            // if entry being updated to existing entry, delete old entry and keep new one
            $deleteQuery = "DELETE FROM $tableName WHERE $idName = :id;";
            $deleteStatement = $db->prepare($deleteQuery);
            $deleteStatement->bindValue(':id', $id);
            $deleteStatement->execute();
            $deleteStatement->closeCursor();
        }

        // return to original page
        $url = "view-list.php?list-name=$tableName&formatted-name=$formattedName";
        header("Location: $url");
    }

?>