<?php
include_once 'connection.php';

$id = $_POST['id'];
$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];

$sql = "SELECT * FROM `users` WHERE `username` = :username AND `id` != :id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':username', $username);
$stmt->bindParam(':id', $id);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    header('Location: ../users.php?type=error&message=' . $username . ' already exists');
    exit;
}

$sql = "UPDATE users SET username = :username, password = :password, level = :level WHERE id = :id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':username', $username);
$stmt->bindParam(':password', password_hash($password, PASSWORD_DEFAULT));
$stmt->bindParam(':level', $level);
$stmt->bindParam(':id', $id);
$stmt->execute();

generate_logs('Updating User', $username . '| User was updated');
header('Location: ../users.php?type=success&message=' . $username . ' was updated successfully');
exit;
