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

    $user=$_SESSION['user_id'];
    $bookid=$_POST['ID'];
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
    echo $slotid[0];
    echo $service;
    $query = " UPDATE booking SET Service='$service', DrName='$doctor', BookDate = '$date', BookTime = '$time', 
        SlotID = '$slotid[0]', Remarks= '$remarks' WHERE BookID='$bookid' ";
    echo $query;
    $result = mysqli_query($conn, $query);
    echo "Affected rows: " . mysqli_affected_rows($conn);
	if( $_SESSION['username'] == 'admin'){		
		header('location: ../admin.php');
	}
	header('location: ../status.php');
?>
