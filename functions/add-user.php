<?php
include_once 'connection.php';

$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];


$sql = "SELECT * FROM `users` WHERE `username` = :username";
$stmt = $db->prepare($sql);
$stmt->bindParam(':username', $username);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    header('Location: ../users.php?type=error&message=' . $username . ' exist already exist');
    exit;
}


$sql = "INSERT INTO users (username, password, level) VALUES (:username, :password, :level)";
$stmt = $db->prepare($sql);
$stmt->bindParam(':username', $username);
$stmt->bindParam(':password', password_hash($password, PASSWORD_DEFAULT));
$stmt->bindParam(':level', $level);
$stmt->execute();

generate_logs('Adding User', $username . '| New user was added');
header('Location: ../users.php?type=success&message=' . $username . ' was added successfully');
exit;
