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

    $user=$_POST['user'];
    $password=$_POST['password'];
    $query="select * from users where Username='$user' and Password='$password'";
    $run=mysqli_query($conn,$query);
    if(mysqli_num_rows($run)>0) {
        echo"<p>login successfully</p>";
        //echo "<script> window.open('index.php','_self')</script>";
        $message = "success";
        //echo "<script type='text/javascript'>alert('$message');</script>";
        header("Location: ../status.html");
        $_SESSION['user']=$user;
    } else {
        echo"<p>invalid username or password!</p>";
        $message = "No";
        //echo "<script type='text/javascript'>alert('$message');</script>";
        header("Location: ../register.php");
    }
    //echo $message;
?>
