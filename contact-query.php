<?php

// db connection

require_once "./db-con.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    

    // Prepare SQL statement to insert data into the table
    $sql = "INSERT INTO contact_us (`name`, `email`, `subject`, `message`) 
            VALUES ('$name', '$email', '$subject', '$message')";

if (mysqli_query($con, $sql)) {
    header("Location:contact.php");
}



   
}







?>