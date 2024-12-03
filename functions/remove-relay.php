<?php
include_once 'connection.php';

$id = $_POST['id'];

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SESSION['level'] != 0){
    header('location: ../dashboard.php?type=error&message=You dont have permission!');
    exit();
}

$sql = "DELETE FROM relays WHERE id = :id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();

generate_logs('Remove relay', $fullname . '| relay details were removed');
header('Location: ../relays.php?type=success&message=relay details were removed successfully');
exit;
