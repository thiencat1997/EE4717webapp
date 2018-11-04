<?php
    session_start();
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

    $connectdb = mysqli_select_db($conn, 'booking');
    $bookid=$_GET['id'];

    $slotquery = "DELETE FROM booking WHERE BookID = '$bookid' ";

    $slot = mysqli_query($conn, $slotquery);
    header('location: ../status.php');
?>
