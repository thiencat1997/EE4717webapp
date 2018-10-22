<html>

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
$sql = "SELECT drinkid, price FROM menu";
$result = mysqli_query($conn, $sql);

if ( mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
		$num = $row['drinkid'];
        $price[ "$num" ] = $row["price"];
    }
}

mysqli_close($conn);
?>

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
					<a href="index.html">Home</a> <br/>
					<a href="menu.php">Menu</a>  <br/>
					<a href="music.html">Music</a>  <br/>
					<a href="jobs.html">Jobs</a>  <br/>
					<hr/>
					<a href="price_update.php">Price Update</a>  <br/>
					<a href="sale_report.html">Sales Report</a>  <br/>
				</b>
			</nav>
		</div>
	
		<div id="rightcolumn" class="content">
		
			<h2>Coffee at JavaJam</h2>
			
			<form method="POST" id="order_form" action="order_action.php"></form>
			
			<table class="stripe" style="padding-left:50px; padding-right:50px;">			
			  <colgroup>
				<col span="1"  style="text-align:center; ">
				<col style="font: Lucida Console, Monaco, monospace">
			  </colgroup>
			  
			      <tr>
			        <th>Name</th>
			        <th>Description</th>
			        <th>Price</th>
			        <th>Quantity</th>
			        <th>Subtotal</th>
			      </tr>
				<tr>
					<td align="center"><strong>Just Java</strong></td>
					<td>
						Regular house blend, decaffeintated coffee, or flavor of the day						
					</td>
					<td width='150'>Engless Cup $<?php echo $price[1] ?></td>
        			<td width='50'><input type="number" id="Qty1" name="Qty1"  form="order_form"></td>
					<td id="subTotal1"></td>
				</tr>
				
				<tr>
					
					<td align="center"><strong>Cafe au Lait</strong></td>
					<td>
						House blended coffee infused into a smooth steamed milk<br/>
					</td>	
					<td>
						<input type="radio" name="radio2" value="single"  form="order_form">Single $<?php echo $price[2] ?><br>
						<input type="radio" name="radio2" value="double"  form="order_form">Double $<?php echo $price[3] ?><br>
					</td>
        			<td><input type="number" id="Qty2" name="Qty2" form="order_form"></td>
					<td id="subTotal2"></td>
					
					
				</tr>
				<tr>
							
					<td align="center"><strong>Iced Cappuccino</strong></dt>
					<td>
						Sweetened espresso blended with icy-cold milk and served in a chilled glass<br/>
					</td>
					<td>					
						<input type="radio" name="radio3" value="single" form="order_form">Single $<?php echo $price[4] ?><br> 
						<input type="radio" name="radio3" value="double"  form="order_form">Double $<?php echo $price[5] ?><br>
					</td>
        			<td><input type="number" id="Qty3" name="Qty3"  form="order_form"></td>
					<td id="subTotal3"></td>
					
				</tr>
				<tr>
			        <td colspan="3"></td>
			        <td colspan="1"> Total: </td>		
			        <td id="total"></td>
			    </tr>
				<tr>				
					<td colspan="5" align="right"><input type="submit" value="Order" form="order_form"></td>
				</tr>
			</table>
	</div>
	
	</div>


	<footer>
		<small><i>		
		Copyright &copy; 2014 JavaJam Coffee House<br/>
		<a href="mailto:cat@le.com">cat@le.com</a>
		</i></small>
	</footer>
</div>

</body>
<script>
var qtyBox1 = document.getElementById('Qty1');
var qtyBox2 = document.getElementById('Qty2');
var qtyBox3 = document.getElementById('Qty3');	

var subTotalBox1 = document.getElementById('subTotal1');
var subTotalBox2 = document.getElementById('subTotal2');
var subTotalBox3 = document.getElementById('subTotal3');
var totalBox = document.getElementById('total');

var radBox2 = document.getElementsByName('radio2');
var radBox3 = document.getElementsByName('radio3');

qtyBox1.addEventListener("change", calc);
qtyBox2.addEventListener("change", calc);
qtyBox3.addEventListener("change", calc);


for(var i = radBox2.length; i--; ) {
    radBox2[i].onclick = calc;
}

for(var i = radBox3.length; i--; ) {
    radBox3[i].onclick = calc;
}

 
function calc(){
	var qty1 = parseInt(qtyBox1.value, 10);
	var qty2 = parseInt(qtyBox2.value, 10);
	var qty3 = parseInt(qtyBox3.value, 10);
	  
	var price2, price3, subTotal1=0, subTotal2=0, subTotal3=0,total=0;
	var price1 = parseFloat("<?php echo $price[1] ?>");
	
	for (var i = 0, length = radBox2.length; i < length; i++) {
		if (radBox2[i].checked) {
			if(radBox2[i].value==="single"){
				price2 = parseFloat("<?php echo $price[2] ?>");
			}
			else if(radBox2[i].value==="double"){
			 	price2= parseFloat("<?php echo $price[3] ?>");
			}
		}
	}

	for (var i = 0, length = radBox3.length; i < length; i++) {
		if (radBox3[i].checked) {
			if(radBox3[i].value==="single"){
				price3 = parseFloat("<?php echo $price[4] ?>");
			}
			else if(radBox3[i].value==="double"){
			 	price3 = parseFloat("<?php echo $price[5] ?>");
			}
		}
	}
	
	if (!isNaN(qty1)) {
		subTotal1 = parseFloat(qty1 * price1); 
		subTotalBox1.textContent = subTotal1;
	}
	
	if (!isNaN(qty2)) { 
		subTotal2 = parseFloat(qty2 * price2); 
		subTotalBox2.textContent = subTotal2;
	}
	
	if (!isNaN(qty3)) { 
		subTotal3 = parseFloat(qty3 * price3); 
		subTotalBox3.textContent = subTotal3;
	}
		
	total = subTotal1 + subTotal2 +subTotal3;
 	totalBox.textContent = total;
}
 
</script>
</html>
