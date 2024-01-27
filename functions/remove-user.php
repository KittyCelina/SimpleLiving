<?php
include_once 'connection.php';

$id = $_POST['id'];

$sql = "DELETE FROM users WHERE id = :id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();

generate_logs('Remove relay', 'user details were removed');
header('Location: ../users.php?type=success&message=user details were removed successfully');
exit;
