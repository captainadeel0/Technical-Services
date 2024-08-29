<?php
session_start();
require_once "./db-con.php";

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Ensure the ID is valid
    if ($id > 0) {
        // Fetch the image name to delete from the server
        $select_query = "SELECT image FROM testimonial WHERE id = $id";
        $select_result = mysqli_query($con, $select_query);

        if ($select_result && mysqli_num_rows($select_result) > 0) {
            $row = mysqli_fetch_assoc($select_result);
            $image = $row['image'];

            // Delete the record from the database
            $delete_query = "DELETE FROM testimonial WHERE id = $id";
            $delete_result = mysqli_query($con, $delete_query);

            if ($delete_result) {
                // Delete the image file from the server
                if (file_exists("img/testimonial/$image")) {
                    unlink("img/testimonial/$image");
                }

                $_SESSION['success'] = "testimonial deleted successfully.";
            } else {
                $_SESSION['error'] = "Failed to delete testimonial. Please try again.";
            }
        } else {
            $_SESSION['error'] = "Testimonial not found.";
        }
    } else {
        $_SESSION['error'] = "Invalid testimonial ID.";
    }
} else {
    $_SESSION['error'] = "No testimonial ID provided.";
}

header("Location: testimonial.php");
exit();
