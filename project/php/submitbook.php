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

    $service=$_POST['service'];
    $doctor=$_POST['doctor'];
    $date=$_POST['date'];
    $time=$_POST['time'];
    $remarks=$_POST['remarks'];

    $slotid = "SELECT SlotID FROM doctors WHERE DrName = '"$doctor"' AND Time = '"$time"'";

    $query = "INSERT INTO booking (Service, DrName, 'Date', 'Time', SlotID, Remarks) VALUES ('$service', '$doctor', '$date', '$time',$slotid, $remarks)";
    $result = mysqli_query($conn, $query);

    header('location: ../status.html');

?>
