<?php
    $host = 'localhost';
    $username = 'root'; // Your DB username
    $password = ''; // Your DB password
    $database = 'poranan'; // Your database name
    try {
        $con = new PDO("mysql:host=$host;dbname=$database", $username, $password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Database connection failed: " . $e->getMessage());
    }
?>