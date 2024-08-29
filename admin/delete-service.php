<?php
session_start();
require_once "./db-con.php";

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Ensure the ID is valid
    if ($id > 0) {
        // Fetch the image name to delete from the server
        $select_query = "SELECT image FROM services WHERE id = $id";
        $select_result = mysqli_query($con, $select_query);

        if ($select_result && mysqli_num_rows($select_result) > 0) {
            $row = mysqli_fetch_assoc($select_result);
            $image = $row['image'];

            // Delete the record from the database
            $delete_query = "DELETE FROM services WHERE id = $id";
            $delete_result = mysqli_query($con, $delete_query);

            if ($delete_result) {
                // Delete the image file from the server
                if (file_exists("img/service/$image")) {
                    unlink("img/service/$image");
                }

                $_SESSION['success'] = "Service deleted successfully.";
            } else {
                $_SESSION['error'] = "Failed to delete service. Please try again.";
            }
        } else {
            $_SESSION['error'] = "Service not found.";
        }
    } else {
        $_SESSION['error'] = "Invalid service ID.";
    }
} else {
    $_SESSION['error'] = "No service ID provided.";
}

header("Location: service.php");
exit();
