<?php
$servername = "localhost";
$username = "f31ee";
$password = "f31ee";
$dbname = "f31ee";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT order_table.drinkid, order_table.quantity, menu.price, order_table.date 
FROM menu INNER JOIN order_table 
ON menu.drinkid = order_table.drinkid;";
$result = mysqli_query($conn, $sql);
$sales[1]=0;
$sales[2]=0;
$sales[3]=0;
$sales[4]=0;
$sales[5]=0;

if ( mysqli_num_rows($result) ) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
		$num = $row['drinkid'];
		$sales[ "$num" ] += $row["price"] *$row["quantity"];
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
	<title>JavaJam Coffee House</title>
	  <link rel="stylesheet" href="styles.css">
</head>
<body>
<div id="wrapper">
	<header>
		<!-- <h1>JavaJam Coffee House</h1> -->
		<img src="media/title.PNG" style="padding-left: 10px; width: 500px" alt="javajam coffee house">
	</header>
	<div id="bodyrow">
		<div id="leftcolumn">	
			<nav>
				<b>
					<a href="sale_report.html">Sales Report</a>  <br/>
				</b>
			</nav>
		</div>
	
		<div id="rightcolumn" class="content">
		
			<h2>Total dollars sales by product</h2>
			<p></p>
			
			<table style="padding-left:50px; padding-right:50px;">			
			  <colgroup>
				<col span="1"  style="text-align:center; ">
				<col style="font: Lucida Console, Monaco, monospace">
			  </colgroup>
			  
			      <tr style="background-color: #D2B48C;">
			        <th>Drink</th>
			        <th>Type</th>
			        <th>Sales</th>
			      </tr>
				<tr>
					<td align="center"><strong>Just Java</strong></td>
					<td width='150'>Engless Cup </td>
        			<td width='50'>$<?php echo $sales[1] ?> </td>
				</tr>
				<tr>
					<td align="center" rowspan='2'><strong>Cafe au Lait</strong></td>
					<td width='150'>Single </td>
        			<td width='50'>$<?php echo $sales[2] ?> </td>
				</tr>
				<tr>
					<td width='150'>Double </td>
        			<td width='50'>$<?php echo $sales[3] ?> </td>
				</tr>
				<tr>
					<td align="center" rowspan='2'><strong>Iced Cappuccino</strong></td>
					<td width='150'>Single </td>
        			<td width='50'>$<?php echo $sales[4] ?> </td>
				</tr>
				<tr>
					<td width='150'>Double </td>
        			<td width='50'>$<?php echo $sales[5] ?> </td>
				</tr>			      
				<tr style="background-color: #D2B48C;">
			        <td colspan='2' align='right'>Total</td>
			        <td>$<?php echo $sales[5]+$sales[4]+$sales[3]+$sales[2]+$sales[1] ?></td>
			      </tr>
			</table>
	
	</div>


	<footer>
		<small><i>		
		Copyright &copy; 2014 JavaJam Coffee House<br/>
		<a href="mailto:cat@le.com">cat@le.com</a>
		</i></small>
	</footer>
</div>

</body>
</html>
