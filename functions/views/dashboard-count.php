<?php
include_once 'functions/connection.php';

function DevicesCount() {
    global $db;
    $sql = 'SELECT COUNT(*) AS total FROM `devices`';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch();
    $total = $result['total'];
    return $total;
}

function RelaysCount() {
    global $db;
    $sql = 'SELECT COUNT(*) AS total FROM `relays`';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch();
    $total = $result['total'];
    return $total;
}

function UsersCount() {
    global $db;
    $sql = 'SELECT COUNT(*) AS total FROM `users`';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch();
    $total = $result['total'];
    return $total;
}