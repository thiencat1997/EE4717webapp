<?php
    include_once './db_connect.php';
    
    $title=$_POST['title'];
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $username=$_POST['username'];
    $pwd=$_POST['pwd'];
    $hash = password_hash( $pwd , PASSWORD_DEFAULT );
    $email=$_POST['email'];
    $phone=$_POST['phone'];

    $query = "INSERT INTO users (Title, Firstname, Lastname, Username, Password, Email, Phone) VALUES ('$title', '$firstname', '$lastname', '$username', '$hash', '$email', '$phone')";
    $result = mysqli_query($conn, $query);

    header('location: ../register.php');
?>
