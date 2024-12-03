<?php
include_once 'setup.php';

if (!$db) {
    die("Connection failed: " . $db->connect_error);
}

function generate_logs($type, $logs)
{
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    global $db;
    $sql = "INSERT INTO logs (user_id, logs, type) VALUES (:user_id, :logs, :type)";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':user_id', $_SESSION['id']);
    $stmt->bindParam(':logs', $logs);
    $stmt->bindParam(':type', $type);
    $stmt->execute();
}

function generate_relay_logs($relay, $logs)
{
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    global $db;
    $sql = "INSERT INTO relay_logs (relay_id, logs) VALUES (:relay_id, :logs)";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':relay_id', $relay);
    $stmt->bindParam(':logs', $logs);
    $stmt->execute();
}
