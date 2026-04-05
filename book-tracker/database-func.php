<?php
    function simpleQueryDB ($query) {
            global $db; // $db must be global to be accessible when function is called
            $statement = $db->prepare($query);
            $statement->execute();
            $result_array = $statement->fetchAll();
            $statement->closeCursor();
            return $result_array;
        }
?>