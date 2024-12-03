<?php
include_once 'connection.php';

$name = $_POST['name'];
$device = $_POST['device'];
$relay = $_POST['relay'];
$level = $_POST['level'];

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SESSION['level'] != 0){
    header('location: ../dashboard.php?type=error&message=You dont have permission!');
    exit();
}

$sql = "SELECT * FROM `relays` WHERE `device` = :device AND `relay` = :relay";
$stmt = $db->prepare($sql);
$stmt->bindParam(':device', $device);
$stmt->bindParam(':relay', $relay);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    header('Location: ../relays.php?type=error&message='. $name .' '. $device . ' ' . $relay . ' exist already exist');
    exit;
}


$sql = "INSERT INTO relays (name, device, relay, level) VALUES (:name, :device, :relay, :level)";
$stmt = $db->prepare($sql);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':device', $device);
$stmt->bindParam(':relay', $relay);
$stmt->bindParam(':level', $level);
$stmt->execute();

generate_logs('Adding Relay', $device . ' ' . $relay . '| New relay was added');
header('Location: ../relays.php?type=success&message=' . $name .' '. $device . ' ' . $relay . ' was added successfully');
exit;
