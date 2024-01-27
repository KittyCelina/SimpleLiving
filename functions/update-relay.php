<?php
include_once 'connection.php';

$id = $_POST['id'];
$name = $_POST['name'];
$device = $_POST['device'];
$relay = $_POST['relay'];
$level = $_POST['level'];

$sql = "SELECT * FROM `relays` WHERE `device` = :device AND `relay` = :relay AND `id` != :id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':device', $device);
$stmt->bindParam(':relay', $relay);
$stmt->bindParam(':id', $id);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    header('Location: ../relays.php?type=error&message='. $name .' '. $device . ' ' . $relay . ' does not exist');
    exit;
}

$sql = "UPDATE relays SET name = :name, device = :device, relay = :relay, level = :level WHERE id = :id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':level', $level);
$stmt->bindParam(':device', $device);
$stmt->bindParam(':relay', $relay);
$stmt->execute();

generate_logs('Updating Relay', $device . ' ' . $relay . '| Relay was updated');
header('Location: ../relays.php?type=success&message=' . $name .' '. $device . ' ' . $relay . ' was updated successfully');
exit;
