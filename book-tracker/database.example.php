<?php
    $dsn = 'mysql:host=YOUR_HOST;dbname=books';
    $username = 'YOUR_USERNAME';
    $password = 'YOUR_PASSWORD';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('database_error.php');
        exit();
    };
?>