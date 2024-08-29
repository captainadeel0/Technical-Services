<?php
session_start();
require_once './db-con.php'; // Ensure this file connects to your database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get and sanitize form inputs
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password']; // Assume plain text password for this example

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['msg'] = '<div class="alert alert-danger">Invalid email format.</div>';
        header('Location: signin.php');
        exit();
    }

    // Prepare a statement to prevent SQL injection
    $stmt = $con->prepare("SELECT id, password FROM admin WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $hashed_password);
        $stmt->fetch();

        // Verify password
        if ($password === $hashed_password) {
            // Password is correct
            $_SESSION['id'] = $id;
            $_SESSION['msg'] = '<div class="alert alert-success">Login successful!</div>';
            header('Location: index.php'); // Redirect to the admin dashboard or another page
            exit();
        } else {
            // Incorrect password
            $_SESSION['msg'] = '<div class="alert alert-danger">Invalid password.</div>';
        }
    } else {
        // Email not found
        $_SESSION['msg'] = '<div class="alert alert-danger">No account found with that email.</div>';
    }

    $stmt->close();

    // Redirect back to the login page
    header('Location: signin.php');
    exit();
}
?>
