<?php
include_once "config.php";
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);
    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($message)){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $sql = mysqli_query($conn, "INSERT INTO feedback (fname, lname, email, message) VALUES ('{$fname}','{$lname}', '{$email}', '{$message}')");
            if($sql){
                echo "success";

            }else {
                echo "Something went wrong. Please try again!";
            }            
        }else {
            echo "$email is not a valid email!";
        }
    }else {
        echo "All input fields are required!";
    }
?>