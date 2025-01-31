
<?php
session_start();
include_once "config.php";

$sender_id = $_SESSION['unique_id'];
$receiver_id = $_POST['receiver_id'];

// Insert a new request or update if it already exists
$sql = "INSERT INTO message_requests (sender_id, receiver_id, status)
        VALUES ($sender_id, $receiver_id, 'pending')
        ON DUPLICATE KEY UPDATE status = 'pending'";

if (mysqli_query($conn, $sql)) {
    echo "Message request sent!";
} else {
    echo "Failed to send request.";
}
?>
