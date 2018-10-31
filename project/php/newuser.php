<?php
    $servername = "localhost";
    $username = "f31ee";
    $password = "f31ee";
    $dbname = "f31ee";


    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (mysqli_connect_error()) {
        die("Connection failed: " . mysqli_connect_error());
    }
    //else
    //  echo "connected successfully";

    $connectdb = mysqli_select_db($conn, 'users');

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
