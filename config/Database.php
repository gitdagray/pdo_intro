<?php 
    $host = 'localhost';
    $db_name = 'world';
    $username = 'root';
    //$password = 'pa55word';

    try {
        $db = new PDO("mysql:host={$host};dbname={$db_name}", $username);
    } catch (PDOException $e) {
        $error_message = 'Database Error: ';
        $error_message .= $e->getMessage();
        echo $error_message;
        exit();
    }