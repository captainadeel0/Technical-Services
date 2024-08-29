<?php
session_start();

require_once "./db-con.php";
require_once "./includes/helpers.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Sanitize and validate POST data
    $client_name = mysqli_real_escape_string($con, $_POST['client_name']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $profession = mysqli_real_escape_string($con, $_POST['profession']);

    // Handle file upload
    $imageUpload = uploadImage("testimonial", $_FILES['image']);
    
    if ($imageUpload['errors'] === false) {
        $imageName = $imageUpload['result'];

        // Prepare SQL statement to prevent SQL injection
        $query = "INSERT INTO testimonial (client_name, description, profession, image) 
                  VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($con, $query);
        
        // Bind parameters and execute statement
        mysqli_stmt_bind_param($stmt, 'ssss', $client_name, $description, $profession, $imageName);
        
        if (mysqli_stmt_execute($stmt)) {
            $_SESSION['success'] = "Testimonial added successfully.";
        } else {
            $_SESSION['error'] = "Failed to add testimonial. Please try again.";
        }

        mysqli_stmt_close($stmt);
    } else {
        $_SESSION['error'] = "Failed to upload image: " . $imageUpload['errors'];
    }

    header("Location: ./show-testimonial.php");
    exit();
}
?>
