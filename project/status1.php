<!DOCTYPE html>
<html lang="en">
  <head>
      <title>Check Booking Status</title>
      <meta charset="utf-8">
      <link rel="stylesheet" href="css/styles.css">
      <link rel="stylesheet" href="css/registerstyle.css">
      <link rel="stylesheet" href="css/statusstyle.css">
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

  $query = "SELECT * FROM booking WHERE UserID = $userid";
  $result = mysqli_query($conn, $query);
?>

  <body>
  <div class="banner-container-2" style="background-image: url('media/service-bg.png');">
    <div style="width:1500px; margin: auto" >
      <?php include_once 'subhtml/navbar.php'; ?>
      <div class="banner-text-2">
        Appointment Status
      </div>
    </div>
  </div>


  <div id="welcome" class="container" style ="padding-top: 50px;">
      <div id="details">
        <h2>Booking details:</h2 >
        <form>
          <table id="status">
              <tr>
                  <th>Service</th>
                  <th>Doctor</th>
                  <th>Date</th>
                  <th>Time</th>
                  <th>Remark</th>
                  <th>Edit</th>
                  <th>Cancel</th>
              </tr>
                <?php
                  if ( mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                      echo "<tr>";
                      echo "<td>".$row['Service']."</td>";
                      echo "<td>".$row['DrName']."</td>";
                      echo "<td>".$row['BookDate']."</td>";
                      echo "<td>".$row['BookTime']."</td>";
                      echo "<td>".$row['Remarks']."</td>";
                      echo "<td><a href='edit.php?id=". $row['BookID'] . "'> EDIT </a> </td>";
                      echo "<td> <button onclick=myFunction($row['BookID']) >DELETE</button></td>";
					  
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
		<br/>
      </div>
  </div>
  
  <!-- The Modal -->
	<div id="myModal" class="modal">

	  <!-- Modal content -->
	  <div class="modal-content">
		<span class="close">&times;</span>
		<p>Are you sure to cancel this appointment?</p>
		
		<button class="button">Button</button>
	  </div>

	</div>

<script type="text/javascript">
// Get the modal
var modal = document.getElementById('myModal');

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
function myFunction() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

  </body>
    <?php include_once 'subhtml/footer.php'; ?>
</html>
