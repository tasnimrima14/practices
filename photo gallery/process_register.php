<?php

include 'config/db_config.php';

$name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);
$password = htmlspecialchars($_POST['password']);
$confirm_password = htmlspecialchars($_POST['confirm_password']);

$errorMessage = '';
### Validations
// 1. email can't be empty
if($email === ''){
    $errorMessage .= 'Email can not be empty';
}

// 2. Password can't be empty
if($password === ''){
    $errorMessage .= 'Password can not be empty';
}

// 3. Password and confirm password must match
if($password !== $confirm_password){
    $errorMessage .= 'Password and confirm password must match';
}

if($errorMessage === ''){
    // store user info in db
    $sql = 'insert into users(name,email,password)
     values(?,?,?)';
    $statement = $db->prepare($sql);
    $statement->bind_param("sss",$name,$email, password_hash($password, PASSWORD_DEFAULT));
    $statement->execute();
    $statement->close();
    $db->close();

    header("location:index.php");
}else{
    header("location:register.php?error=" . $errorMessage);
}