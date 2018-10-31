<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Check Booking Status</title>
        <meta charset="utf-8">
    </head>

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
    
    $connectdb = mysqli_select_db($conn, 'booking');

    $display = "SELECT * FROM booking WHERE UserID = ";
    $result = mysqli_query($conn, $display);
    
    while ($row = mysql_fetch_array($query)) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "Service " . $row["Service"]."<br> Doctor: " . $row["Dr"]. "<br> Date: " . $row["Date"]. "<br> Time: " . $row["Time"]. "<br> Remarks: ". $row["Remarks"]. ;
        }
    } else {
        echo "You don't have any appointment.";
    }

?>

    <body>
        <div>
            <table align="center">
                <tr>
                    <td><input type="Submit" name="new" value="New Appointment"></td>
                    <td><input type="Submit" name="status" value="Check Status"></td>
                </tr>
            </table>
        </div>

        <div id="welcome">
            <h2>Welcome!</h2>
            <p>Booking details:</p>
            <div id="detials">
                <table>
                    <tr class="header">
                        <td>Id</td>
                        <td>Name</td>
                        <td>Title</td>
                    </tr>
            <?php
               while ($row = mysql_fetch_array($query)) {
                   echo "<tr>";
                   echo "<td>".$row[ID]."</td>";
                   echo "<td>".$row[Name]."</td>";
                   echo "<td>".$row[Title]."</td>";
                   echo "</tr>";
               }

            ?>
                
                <input type="Submit" name="cancel" value="Cancel">
                <input type="Submit" name="reschedule" value="Reschedule">
            </div>
            <input type="Submit" name="back" value="Back">
        </div>

        </div>
    </body>
</html>