<?php
include_once 'connection.php';

$name = $_POST['device_name'];
$ip_address = $_POST['ip_address'];
$relays = $_POST['relays'];


$sql = "SELECT * FROM `devices` WHERE `ip_address` = :ip_address";
$stmt = $db->prepare($sql);
$stmt->bindParam(':ip_address', $ip_address);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    header('Location: ../devices.php?type=error&message=' . $ip_address . ' exist already exist');
    exit;
}


$sql = "INSERT INTO devices (name, ip_address, relays) VALUES (:name, :ip_address, :relays)";
$stmt = $db->prepare($sql);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':ip_address', $ip_address);
$stmt->bindParam(':relays', $relays);
$stmt->execute();

generate_logs('Adding Device', $name . '| New device was added');
header('Location: ../devices.php?type=success&message=' . $name . ' was added successfully');
exit;
