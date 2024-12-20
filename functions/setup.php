<?php
date_default_timezone_set('Asia/Manila');
$database = 'smartliving';
$db = new PDO('mysql:host=localhost', 'root', 'root1');
$query = "CREATE DATABASE IF NOT EXISTS $database";

try {
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->exec($query);
    $db->exec("USE $database");

    $db->exec("
            CREATE TABLE IF NOT EXISTS users (
              id INT PRIMARY KEY AUTO_INCREMENT,
              username VARCHAR(255),
              password VARCHAR(255),
              level VARCHAR(255),
              created_at DATETIME DEFAULT CURRENT_TIMESTAMP
            )
            ");

    $db->exec("
            CREATE TABLE IF NOT EXISTS relays (
                id INT PRIMARY KEY AUTO_INCREMENT,
                name VARCHAR(255),
                device VARCHAR(255),
                relay INT,
                level VARCHAR(255),
                created_at DATETIME DEFAULT CURRENT_TIMESTAMP
            )
        ");

    $db->exec("
        CREATE TABLE IF NOT EXISTS devices (
            id INT PRIMARY KEY AUTO_INCREMENT,
            name VARCHAR(255),
            ip_address VARCHAR(255),
            relays INT,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP
        )
    ");

    $db->exec("
          CREATE TABLE IF NOT EXISTS logs (
            id INT PRIMARY KEY AUTO_INCREMENT,
            user_id int,
            logs TEXT,
            type TEXT,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
        )
        ");


    $db->beginTransaction();

    $stmt = $db->prepare("SELECT COUNT(*) FROM `users` WHERE `username` = 'admin'");
    $stmt->execute();
    $userExists = $stmt->fetchColumn();

    if (!$userExists) {
        $stmt = $db->prepare("INSERT INTO `users` (`username`, `password`, `level`) VALUES (:username, :password, :level)");
        $stmt->bindValue(':username', 'admin');
        $stmt->bindValue(':password', '$2y$10$WgL2d2fzi6IiGiTfXvdBluTLlMroU8zBtIcRut7SzOB6j9i/LbA4K');
        $stmt->bindValue(':level', 0);
        $stmt->execute();
    }

    $db->commit();
} catch (PDOException $e) {
    die("Error creating database: " . $e->getMessage());
}
