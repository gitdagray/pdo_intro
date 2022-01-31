<?php 
    $host = 'localhost';
    $db_name = 'world';
    $username = 'root';
    //$password = 'pa55word';

    try {
        $db = new PDO("mysql:host={$host};dbname={$db_name}", $username); //, $password
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        $error_message = 'Database Error: ';
        $error_message .= $e->getMessage();
        echo $error_message;
        exit('Unable to connect to the database');
    }