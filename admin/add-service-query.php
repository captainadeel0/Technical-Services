<?php

session_start();

require_once "./db-con.php";
require_once "./includes/helpers.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    // echo "<pre>"; print_r($_POST); echo "</pre>";
    // echo "<pre>"; print_r($_FILES); echo "</pre>";

        $data = uploadImage("service", $_FILES['image']);

        if ($data['errors'] === false) {
            $name = $data['result'];

            // echo $name;
            // exit;
            

            $query = "INSERT INTO `services`(`service_type`, `description`, `image`) 
            VALUES ('$_POST[service_type]','$_POST[description]',  '$name') ";
    
             $result = mysqli_query($con, $query);
            
     if ($result) {
      
        $_SESSION['success'] = "Testimonial added successfully.";
    } else {
      
        $_SESSION['error'] = "Failed to add testimonial. Please try again.";
    }

    header("Location:./service.php");
    exit();
}
}

?>