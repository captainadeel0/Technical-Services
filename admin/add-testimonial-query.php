<?php

session_start();

require_once "./db-con.php";
require_once "./includes/helpers.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    // echo "<pre>"; print_r($_POST); echo "</pre>";
    // echo "<pre>"; print_r($_FILES); echo "</pre>";

        $data = uploadImage("testimonial", $_FILES['image']);

        if ($data['errors'] === false) {
            $name = $data['result'];

            // echo $name;
            // exit;
            

            $query = "INSERT INTO `testimonial`(`client_name`, `description`, `profession`, `image`) 
            VALUES ('$_POST[client_name]','$_POST[description]', '$_POST[profession]',  '$name') ";
    
             $result = mysqli_query($con, $query);
            
     if ($result) {
      
        $_SESSION['success'] = "Testimonial added successfully.";
    } else {
      
        $_SESSION['error'] = "Failed to add testimonial. Please try again.";
    }

    header("Location:./show-testimonial.php");
    exit();
}
}

?>