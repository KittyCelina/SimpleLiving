<?php
include_once 'connection.php';

$id = $_POST['id'];

$sql = "DELETE FROM relays WHERE id = :id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();

generate_logs('Remove relay', $fullname . '| relay details were removed');
header('Location: ../relays.php?type=success&message=relay details were removed successfully');
exit;
