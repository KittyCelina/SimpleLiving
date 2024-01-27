<?php
include_once 'connection.php';

$id = $_POST['id'];
$name = $_POST['device_name'];
$ip_address = $_POST['ip_address'];
$relays = $_POST['relays'];

$sql = "SELECT * FROM `devices` WHERE `ip_address` = :ip_address AND `id` != :id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':ip_address', $ip_address);
$stmt->bindParam(':id', $id);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    header('Location: ../devices.php?type=error&message=' . $ip_address . ' already exists');
    exit;
}

$sql = "UPDATE devices SET name = :name, ip_address = :ip_address, relays = :relays WHERE id = :id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':ip_address', $ip_address);
$stmt->bindParam(':relays', $relays);
$stmt->bindParam(':id', $id);
$stmt->execute();

generate_logs('Updating Device', $name . '| Device was updated');
header('Location: ../devices.php?type=success&message=' . $name . ' was updated successfully');
exit;
