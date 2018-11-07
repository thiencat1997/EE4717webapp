<?php

    include_once './db_connect.php';
    if(!isset($_SESSION))
    {
        session_start();
    }
    $user=$_SESSION['user_id'];
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
    $query = "INSERT INTO booking (UserID, Service, DrName, BookDate,BookTime, SlotID, Remarks) VALUES ('$user','$service', '$doctor', '$date', '$time','$slotid[0]', '$remarks')";
    $result = mysqli_query($conn, $query);
    $_SESSION['updated'] = true;
    header('location: ../booking.php');
?>
