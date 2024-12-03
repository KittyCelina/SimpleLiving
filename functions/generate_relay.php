<?php
include_once 'connection.php';
session_start();
$relay = $_POST['relay'];
$type = $_POST['type'];
if ($type == 'on'){
    generate_relay_logs($relay, $_SESSION['username'] .' | Relay has been turn on');
} else {
    generate_relay_logs($relay, $_SESSION['username'] .' | Relay has been turn off');
}
