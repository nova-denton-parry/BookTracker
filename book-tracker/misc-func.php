<?php

    // get info from the database
    include('database.php');
    include('database-func.php');

    $allGenresQuery = 'SELECT * FROM genres;';
    $allGenresArray = simpleQueryDB($allGenresQuery);

    $allStatusesQuery = 'SELECT * FROM statuses;';
    $allStatusesArray = simpleQueryDB($allStatusesQuery);

    $allFormatsQuery = 'SELECT * FROM formats;';
    $allFormatsArray = simpleQueryDB($allFormatsQuery);

    $allSourcesQuery = 'SELECT * FROM sources;';
    $allSourcesArray = simpleQueryDB($allSourcesQuery);

    function createOptions ($tableArray, $columnName) {
        foreach($tableArray as $row):
            $name = $row[$columnName]; ?>
            <option value='<?php echo($name); ?>'><?php echo($name); ?></option>
        <?php endforeach;
    }

    function createOptionsWithDefault ($tableArray, $columnName, $default) {
        foreach($tableArray as $row):
            $name = $row[$columnName];
            if ($name == $default) {
                ?>
                <option value='<?php echo($name); ?>' selected><?php echo($name); ?></option>
            <?php } else {
                ?>
                <option value='<?php echo($name); ?>'><?php echo($name); ?></option>
                <?php }
        endforeach;
    }

?>