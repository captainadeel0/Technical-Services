<?php
// db connection
require_once "./db-con.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $subject = mysqli_real_escape_string($con, $_POST['subject']);
    $message = mysqli_real_escape_string($con, $_POST['message']);

    // Prepare SQL statement to insert data into the table
    $sql = "INSERT INTO contact_us (`name`, `email`, `subject`, `message`) 
            VALUES ('$name', '$email', '$subject', '$message')";

    if (mysqli_query($con, $sql)) {
        session_start();
        $_SESSION['success'] = "Message sent successfully.";
    } else {
        session_start();
        $_SESSION['error'] = "Failed to send message. Please try again.";
    }

    header("Location: contact.php");
    exit();
}
?>
