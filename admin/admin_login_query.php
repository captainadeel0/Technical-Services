<?php
    session_start();
    require_once "./db-con.php";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
            
        $email = $_POST['email'];
        $password = $_POST['password'];



        $query=mysqli_query($con,"SELECT * FROM `admin` WHERE email='$email' AND password='$password'");
        $res=mysqli_fetch_array($query);
        $id=$res['id'];

        if (mysqli_num_rows($query)<1){
            $_SESSION['msg']="Login Failed, Admin not found!";
            header('Location:signin.php');
        }

        else{
            $res=mysqli_fetch_array($query);
            $_SESSION['id']=$res['id'];
            header('Location:index.php');
            
            }
        }
?>
