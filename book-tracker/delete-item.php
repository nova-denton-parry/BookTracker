<?php

    // get info for book to be deleted
    $id = filter_input(INPUT_POST, 'item-id');
    $tableName = filter_input(INPUT_POST, 'item-type');
    $formattedName = filter_input(INPUT_POST, 'formatted-name');

    $idName = strtolower($formattedName) . '_id';

    // delete the data
    include('database.php');

    $deleteQuery = "DELETE FROM $tableName WHERE $idName = :id;";
    $statement = $db->prepare($deleteQuery);
    $statement->bindValue(':id', $id);
    $statement->execute();
    $statement->closeCursor();

    // return to original page
    $url = "view-list.php?list-name=$tableName&formatted-name=$formattedName";
    header("Location: $url");

?>