<!DOCTYPE html>
<html lang="en">
  <head>
      <title>Admin Page</title>
      <meta charset="utf-8">
      <link rel="stylesheet" href="css/styles.css">
      <link rel="stylesheet" href="css/registerstyle.css">
      <style type="text/css">
  
      </style>
  </head>

<?php
  if(!isset($_SESSION))
  {
      session_start();
  }
  $servername = "localhost";
  $username = "f31ee";
  $password = "f31ee";
  $dbname = "f31ee";
  $userid=$_SESSION['user_id'];


  // Create connection
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  // Check connection
  if (mysqli_connect_error()) {
      die("Connection failed: " . mysqli_connect_error());
  }
  //else
  //  echo "connected successfully";

  $connectdb = mysqli_select_db($conn, 'booking');

  $query = "SELECT * FROM booking AS b LEFT JOIN users AS u ON b.UserID=u.UserID";
  $result = mysqli_query($conn, $query);
?>

  <body>
  <div class="banner-container-2" style="background-image: url('media/service-bg.png');">
    <div style="width:1500px; margin: auto" >
      <?php include_once 'subhtml/navbar.php'; ?>
      <div class="banner-text-2">
        Admin Page
      </div>
    </div>
  </div>


  <div id="welcome" class="container" style ="padding-top: 50px;">
      <div id="details">
        <h2>Booking details:</h2 >
        <form>
          <table id="status">
              <tr>
                  <th>Patient</th>
                  <th>Service</th>
                  <th>Doctor</th>
                  <th>Date</th>
                  <th>Time</th>
                  <th>Remark</th>
                  <th></th>
                  <th></th>
              </tr>
                <?php
                  if ( mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                      echo "<tr>";
                      echo "<td>".$row['Firstname']." ".$row['Lastname']."</td>";
                      echo "<td>".$row['Service']."</td>";
                      echo "<td>".$row['DrName']."</td>";
                      echo "<td>".$row['BookDate']."</td>";
                      echo "<td>".$row['BookTime']."</td>";
                      echo "<td>".$row['Remarks']."</td>";
                      echo "<td><a href='edit.php?id=". $row['BookID'] . "'> EDIT </a> </td>";
                      echo "<td> <a href='php/cancel.php?id=". $row['BookID'] . "'> DELETE </a></td>";
                      echo "</tr>";

                    }
                  } else {  
                      echo "You don't have any appointment.";
                  }
                ?>
          </table>


          <p style="text-align: center;" ><a class="button" href="booking.php" style=" width: 500px;">New Appointment</a></p>
        </form>
      </div>
  </div>

  </body>
    <?php include_once 'subhtml/footer.php'; ?>
</html>
