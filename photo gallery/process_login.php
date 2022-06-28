<?php

include 'config/db_config.php';
session_start();

$email = htmlspecialchars($_POST['email']);
$password = htmlspecialchars($_POST['password']);

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

// 3. Password must match with database
$query="select * from users where email='$email'";
$res=$db->query($query) or die('wrong query');

$row=$res->fetch_array(MYSQLI_ASSOC);

if(!empty($row)) {
    if(password_verify($password, $row['password'])){
        // store user info into session
        $_SESSION['id'] = $row['id'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['password'] = $row['password'];
    }
}else {
    $errorMessage .= 'Invalid User.';
}

if($errorMessage === ''){
    header("location:photo_gallery.php");
}else{
    header("location:index.php?error=" . $errorMessage);
}