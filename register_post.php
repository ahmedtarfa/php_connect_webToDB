<?php

include('inc/connections.php');
$err_s=0;


if(isset($_POST['signup'])){
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $email=strtolower($_POST['email']);
    $password=$_POST['password'];
    $phone=$_POST['phone'];
    $dob=$_POST['birthday'];

    $first_name = htmlentities(mysqli_real_escape_string($conn,strtoupper($_POST['first_name'])));
    $last_name = htmlentities(mysqli_real_escape_string($conn,strtoupper($_POST['last_name'])));
    $email = htmlentities(mysqli_real_escape_string($conn,strtolower($_POST['email'])));
    $password = htmlentities(mysqli_real_escape_string($conn,$_POST['password']));
    $phone = htmlentities(mysqli_real_escape_string($conn,$_POST['phone']));
    $dob = htmlentities(mysqli_real_escape_string($conn,$_POST['birthday']));

    if(empty($first_name)){
        $name_error = '<p id="error">Enter first name</p>';
        $err_s=1;
    }
    elseif(empty($last_name)){
        $name_error = '<p id="error">Enter last name</p>';
        $err_s=1;
    }
    elseif(empty($email)){
        $email_error = '<p id="error">Enter email</p>';
        $err_s=1;
    }
    elseif(empty($password)){
        $password_error = '<p id="error">Enter password</p>';
        $err_s=1;
    }
    elseif(strlen($password) <6){
        $password_error = '<p id="error">password at least 6 letter </p>';
        $err_s=1;
    }
    elseif(filter_var($first_name, FILTER_VALIDATE_INT)){
        $name_error = '<p id="error">Enter valid name</p>';
        $err_s=1;
    }
    elseif(filter_var($last_name, FILTER_VALIDATE_INT)){
        $name_error = '<p id="error">Enter valid name</p>';
        $err_s=1;
    }
    elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $email_error = '<p id="error">Enter valid email</p>';
        $err_s=1;
    }

    $query = "SELECT * FROM `users` WHERE `email`='$email'";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0){
        $email_error = 'Email already exists. Please use a different email.<br>';
        $err_s=1;
    }
    $queryP = "SELECT * FROM `users` WHERE `phone`='$phone'";
    $resultP = mysqli_query($conn, $queryP);
    if(mysqli_num_rows($resultP) > 0){
        $phone_error = 'phone number already exists. Please use a different phone number.<br>';
        $err_s=1;
    }

    if($err_s == 0){
        $sql = "INSERT INTO `users`(`user_id`, `first_name`, `last_name`, `dob`, `password_hash`, `email`, `phone`, `about`) 
        VALUES ('', '$first_name', '$last_name', '$dob', '$password', '$email', '$phone', '')";
        mysqli_real_query   ($conn,$sql);
        header('location:index.php');
}
else{
    include('register.php');
}


}




?>