<?php
session_start();
include('inc/connections.php');

if(isset($_POST['email']) && isset($_POST['password'])){
    $email = strtolower($_POST['email']);
    $password = $_POST['password'];

    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);
}

if(empty($email)){
    $user_error = '<p id="error">Please insert your email</p>';
    $err_s = true;
}

if(empty($password)){
    $pass_error = '<p id="error">Please insert your password</p>';
    $err_s = true;
    
}

if(!isset($err_s)){
    $sql = "SELECT user_id, email, password_hash FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if($row && $row['password_hash']==$password){
        $_SESSION['email'] = $row['email'];
        $_SESSION['id'] = $row['user_id'];
        header('Location: home.php');
        exit();
    }
    else{
        $user_error = '<p id="error">Wrong email or password</p>';
        include('index.php');
        exit();
    }
}