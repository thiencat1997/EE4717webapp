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

    $user='1';
    // $user=$_POST['user'];
    // $password=$_POST['pwd'];
    $query="select * from users where Username=$user";
    $result = mysqli_query($conn,$query);

    if ( mysqli_num_rows($result) > 0) {
    // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $num = $row['Lastname'];
            echo $num;
        }
    }
    else {
        echo 'meiyou';
    }
?>