<?php
header('Content-Type: application/json');
require_once("db-con.php");

// Query to get the count of new messages
$query = "SELECT COUNT(*) AS newMessages FROM contact_us WHERE is_read = 0";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$newMessages = $row['newMessages'];

// Query to get the details of new messages
$messagesQuery = "SELECT id, name, subject FROM contact_us WHERE is_read = 0";
$messagesResult = mysqli_query($con, $messagesQuery);
$messages = [];

while ($message = mysqli_fetch_assoc($messagesResult)) {
    $messages[] = $message;
}

// Return the response as JSON
echo json_encode([
    'newMessages' => $newMessages,
    'messages' => $messages
]);
?>
