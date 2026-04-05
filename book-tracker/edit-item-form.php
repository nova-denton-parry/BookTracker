<?php 

    // get item data
    $id = filter_input(INPUT_POST, 'item-id');
    $tableName = filter_input(INPUT_POST, 'item-type');
    $formattedName = filter_input(INPUT_POST, 'formatted-name');
    $idName = strtolower($formattedName) . '_id';
    $columnName = strtolower($formattedName) . '_name';

    // get item info from database
    include('database.php');
    $itemQuery = "SELECT * FROM $tableName WHERE $idName = $id;";
    $statement = $db->prepare($itemQuery);
    $statement->execute();
    $itemArray = $statement->fetch();
    $statement->closeCursor();

    //display template
    include('template.php');
    echo($head_and_header);

?>

<form action='edit-item.php' method='post' class='mini-form'>
    <input type='hidden' name='table-name' value='<?php echo($tableName); ?>' >
    <input type='hidden' name='formatted-name' value='<?php echo($formattedName); ?>' >
    <input type='hidden' name='item-id' value='<?php echo($id); ?>' >
    <label for='item-name'>Current <?php echo($formattedName); ?> Name: </label>
    <input type='text' name='item-name' id='item-name' value='<?php echo($itemArray[$columnName]); ?>'>
    <input class='button' type='submit' value='Update <?php echo($formattedName); ?>'>
</form>

<?php echo($footer_and_closing_tags); ?>