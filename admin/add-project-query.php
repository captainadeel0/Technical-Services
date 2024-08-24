<?php

session_start();

require_once "./db-con.php";
require_once "./includes/helpers.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    // echo "<pre>"; print_r($_POST); echo "</pre>";
    // echo "<pre>"; print_r($_FILES); echo "</pre>";

        $data = uploadImage("project", $_FILES['image']);

        if ($data['errors'] === false) {
            $name = $data['result'];

            // echo $name;
            // exit;
            

            $query = "INSERT INTO `projects`(`project_type`,  `image`) 
            VALUES ('$_POST[project_type]', '$name') ";
    
             $result = mysqli_query($con, $query);
            
     if ($result) {
      
        $_SESSION['success'] = "Project added successfully.";
    } else {
      
        $_SESSION['error'] = "Failed to add Project. Please try again.";
    }

    header("Location:./project.php");
    exit();
}
}

?>