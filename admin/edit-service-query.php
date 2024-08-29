<?php
session_start();
require_once "./db-con.php";
require_once "./includes/helpers.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = intval($_POST['id']);
    $service_type = mysqli_real_escape_string($con, $_POST['service_type']);
    $description = mysqli_real_escape_string($con, $_POST['description']);

    // Prepare the base query
    $query = "UPDATE services SET service_type = '$service_type', description = '$description'";

    // Handle image upload
    if (!empty($_FILES['image']['name'])) {
        $data = uploadImage("service", $_FILES['image']);

        if ($data['errors'] === false) {
            $image = $data['result'];
            $query .= ", image = '$image'";
        } else {
            $_SESSION['error'] = "Failed to upload image. Please try again.";
            header("Location: edit-service.php?id=$id");
            exit();
        }
    }

    // Finalize the query
    $query .= " WHERE id = $id";

    // Execute the query
    $result = mysqli_query($con, $query);

    if ($result) {
        $_SESSION['success'] = "Service updated successfully.";
    } else {
        $_SESSION['error'] = "Failed to update service. Please try again.";
    }

    header("Location: service.php");
    exit();
}
?>
