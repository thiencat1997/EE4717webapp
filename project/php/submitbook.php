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

    $service=$_POST['service'];
    $doctor=$_POST['doctor'];
    $date=$_POST['date'];
    $time=$_POST['time'];
    $remarks=$_POST['remarks'];
    $slotquery = "SELECT SlotID FROM doctors WHERE DrName = '".$doctor."' AND Timeslot = '".$time."'";

    $slot = mysqli_query($conn, $slotquery);

    $slotid = [];
    while($row = mysqli_fetch_assoc($slot)) {
            $slotid[] = $row['SlotID'];
    }
    $query = "INSERT INTO booking (Service, DrName, BookDate,BookTime, SlotID, Remarks) VALUES ('$service', '$doctor', '$date', '$time','$slotid[0]', '$remarks')";
    $result = mysqli_query($conn, $query);
    $_SESSION['updated'] = true;
    header('location: ../booking.php');
?>
