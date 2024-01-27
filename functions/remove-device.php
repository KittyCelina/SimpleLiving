<?php
include_once 'connection.php';

$id = $_POST['id'];

$sql = "DELETE FROM devices WHERE id = :id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();

generate_logs('Remove device', $fullname . '| Device details were removed');
header('Location: ../devices.php?type=success&message=Device details were removed successfully');
exit;
