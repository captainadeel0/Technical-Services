<?php

session_start();

require_once "./db-con.php";
require_once "./includes/helpers.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    // echo "<pre>"; print_r($_POST); echo "</pre>";
    // echo "<pre>"; print_r($_FILES); echo "</pre>";

        $data = uploadImage("admin", $_FILES['image']);

        if ($data['errors'] === false) {
            $name = $data['result'];

            // echo $name;
            // exit;
            

            $query = "INSERT INTO `admin`(`username`, `email`, `password`, `image`) 
            VALUES ('$_POST[username]','$_POST[email]' ,'$_POST[password]', '$name') ";
    
             $result = mysqli_query($con, $query);
            
     if ($result) {
      
        $_SESSION['success'] = "Admin added successfully.";
    } else {
      
        $_SESSION['error'] = "Failed to add admin. Please try again.";
    }

    header("Location:./admin.php");
    exit();
}
}

?>