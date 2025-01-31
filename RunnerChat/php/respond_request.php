<?php
session_start();
include_once "config.php";

$receiver_id = $_SESSION['unique_id'];
$sender_id = $_POST['sender_id'];
$action = $_POST['action']; // 'accept' or 'reject'

if ($action == 'accept') {
    $status = 'accepted';
} else {
    $status = 'rejected';
}

$sql = "UPDATE message_requests 
        SET status = '$status' 
        WHERE sender_id = $sender_id AND receiver_id = $receiver_id";

if (mysqli_query($conn, $sql)) {
    echo "Request $status successfully!";
} else {
    echo "Failed to update request.";
}
?>
