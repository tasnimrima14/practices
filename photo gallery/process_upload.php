<?php
include 'config/db_config.php';
session_start();

$title = htmlspecialchars($_POST['title']);
$description = htmlspecialchars($_POST['description']);
$user_id = $_SESSION['id'];
$photo = $_FILES['photo'];

### Validations
$errorMessage = '';
// 1. Title is required
if($title === ''){
    $errorMessage .= 'Title is required' . '<br>';
}

// 2. Photo is required
if(!isset($photo)){
    $errorMessage .= 'Photo is required' . '<br>';
}

// 3. Photo must be in png, jpg, jpeg, gif format
if (!(strtoupper(substr($_FILES['photo']['name'], -4)) == ".JPG"
    || strtoupper(substr($_FILES['photo']['name'], -5)) == ".JPEG"
    || strtoupper(substr($_FILES['photo']['name'], -4)) == ".GIF"
    || strtoupper(substr($_FILES['photo']['name'], -4)) == ".PNG" )) {
    $errorMessage.= 'wrong image file  type(supported formats are .jpg, .jpeg, .gif, .png)' . '<br>';
}

if($errorMessage === ''){
    // store file in our system
    move_uploaded_file($photo['tmp_name'], 'photos/'
        . $photo['name']);

    // store info in database
    
    $sql = 'INSERT into photos(user_id,title,description,image)
     values(?,?,?,?)';
    $statement = $db->prepare($sql);
    $statement->bind_param("isss",$user_id,$title, 
        $description, $photo['name']);
    $statement->execute();
    $statement->close();
    $db->close();

    header("location:photo_gallery.php");
}else{
    header("location:photo_gallery.php?error=" . $errorMessage);
}