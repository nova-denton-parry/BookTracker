<?php

    // get info from the database
    include('database.php');

    $tableName = filter_input(INPUT_GET, 'list-name');
    $formattedTableName = filter_input(INPUT_GET, 'formatted-name');
    $columnName = strtolower($formattedTableName) . '_name';
    $idName = strtolower($formattedTableName) . '_id';

    $listAllQuery = "SELECT * FROM $tableName;";
    $statement = $db->prepare($listAllQuery);
    $statement->execute();
    $listAllArray = $statement->fetchAll();
    $statement->closeCursor();

    // display template
    include('template.php');
    echo($head_and_header);
?>

<table>
    <tr>
        <th><?php echo($formattedTableName); ?></th>
        <th></th>
        <th></th>
        <th></th>
    </tr>

    <?php foreach($listAllArray as $row): ?>
        <tr>
            <td><?php echo($row[$columnName]); ?></td>
            <td>
                <form action='view-filtered-books' method='get'>
                    <input type='hidden' name='item-name'
                        value='<?php echo($row[$columnName]); ?>'>
                    <input type='hidden' name='formatted-name' value='<?php echo($formattedTableName); ?>'>
                    <input class='button' type='submit' value='View Books'>
                </form>
            </td>
            <td>
                <form action='edit-item-form.php' method='post'>
                    <input type='hidden' name='item-id'
                        value='<?php echo($row[$idName]); ?>'>
                    <input type='hidden' name='item-type' value='<?php echo($tableName); ?>'>
                    <input type='hidden' name='formatted-name' value='<?php echo($formattedTableName); ?>'>
                    <input class='button' type='submit' value='Edit'>
                </form>
            </td>
            <td>
            <form action='delete-item.php' method='post'
                onsubmit="return confirm('Are you sure you want to delete the <?php echo($row[$columnName]); ?> <?php echo(strtolower($formattedTableName)); ?>?');">
                    <input type='hidden' name='item-id'
                        value='<?php echo($row[$idName]); ?>'>
                    <input type='hidden' name='item-type' value='<?php echo($tableName); ?>'>
                    <input type='hidden' name='formatted-name' value='<?php echo($formattedTableName); ?>'>
                    <input class='button' type='submit' value='Delete'>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<div class='mini-form'>
    <h2>Add <?php echo($formattedTableName); ?></h2>
    <form action='add-item.php' method='post'>
            <label for='item-name'><?php echo($formattedTableName); ?> Name: </label>
            <input type='text' name='item-name' id='item-name'>
            <input type='hidden' name='item-type' value='<?php echo($tableName); ?>'>
            <input type='hidden' name='column-name' value='<?php echo($columnName); ?>'>
            <input type='hidden' name='formatted-name' value='<?php echo($formattedTableName); ?>'>
            <input class='button' type='submit' value='Add <?php echo($formattedTableName); ?>'>
    </form>
</div>

<?php echo($footer_and_closing_tags); ?>