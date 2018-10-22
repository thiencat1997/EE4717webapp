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

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
		$num = $row['drinkid'];
        $price[ "$num" ] = $row["price"];
    }
}

mysqli_close($conn);
?>

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
		
			<h2>Click to update product price</h2>
			<form method="POST" id="my_form" action="update_action.php"></form>
			<table class="stripe" style="padding-left:50px; padding-right:50px;">			
			  <colgroup>
				<col span="1"  style="text-align:center; ">
				<col style="font: Lucida Console, Monaco, monospace">
			  </colgroup>
			  
			      <tr>
					<th>Edit</th>
			        <th>Name</th>
			        <th>Description</th>
			        <th>Price</th>
			      </tr>
				<tr>
					<td> <input type="checkbox" id="editprice1" name="editprice1" onclick="edit1()" form="my_form"> </td>
					<td align="center"><strong>Just Java</strong></td>
					<td>
						Regular house blend, decaffeintated coffee, or flavor of the day						
					</td>
					<td width='150'>Engless Cup $
						<p id="text1" style="display:inline"><?php echo $price[1] ?></p>
						<input type="number" step="any" id="textBox1" name="textBox1" style="display:none" value="<?php echo $price[1] ?>" form="my_form">
					</td>
				</tr>
				
				<tr>
					<td> <input type="checkbox" id="editprice2" name="editprice2" onclick="edit2()" form="my_form"> </td>
					
					<td align="center"><strong>Cafe au Lait</strong></td>
					<td>
						House blended coffee infused into a smooth steamed milk<br/>
					</td>	
					<td>
						Single $
						<p id="text2" style="display:inline"><?php echo $price[2] ?></p>
						<input type="number" step="any" id="textBox2" name="textBox2" style="display:none" value="<?php echo $price[2] ?>" form="my_form">
						<br> 
						Double $
						<p id="text3" style="display:inline"><?php echo $price[3] ?></p>
						<input type="number" step="any" id="textBox3" name="textBox3" style="display:none" value="<?php echo $price[3] ?>" form="my_form">
						<br>
					</td>
					
					
				</tr>
				<tr>
					<td> <input type="checkbox" id="editprice3" name="editprice3" onclick="edit3()" form="my_form"> </td>
							
					<td align="center"><strong>Iced Cappuccino</strong></dt>
					<td>
						Sweetened espresso blended with icy-cold milk and served in a chilled glass<br/>
					</td>
					<td>					
						Single $
						<p id="text4" style="display:inline"><?php echo $price[4] ?></p>
						<input type="number" step="any" id="textBox4" name="textBox4" style="display:none" value="<?php echo $price[4] ?>" form="my_form">
						<br> 
						Double $
						<p id="text5" style="display:inline"><?php echo $price[5] ?></p>
						<input type="number" step="any" id="textBox5" name="textBox5" style="display:none" value="<?php echo $price[5] ?>" form="my_form">
						<br>
					</td>					
				</tr>
				<tr>
				
					<td colspan="4" align="right"><input type="submit" value="Update" form="my_form"></td>
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
function edit1(){
    var checkBox = document.getElementById("editprice1");
    var text = document.getElementById("text1");
	var textBox = document.getElementById("textBox1");
	myFunction(checkBox, text, textBox);
}

function edit2(){
    var checkBox = document.getElementById("editprice2");
    var text = document.getElementById("text2");
	var textBox = document.getElementById("textBox2");
    var text2 = document.getElementById("text3");
	var textBox2 = document.getElementById("textBox3");
	myFunction(checkBox, text, textBox);
	myFunction(checkBox, text2, textBox2);
}

function edit3(){
    var checkBox = document.getElementById("editprice3");
    var text = document.getElementById("text4");
	var textBox = document.getElementById("textBox4");
    var text2 = document.getElementById("text5");
	var textBox2 = document.getElementById("textBox5");
	myFunction(checkBox, text, textBox);
	myFunction(checkBox, text2, textBox2);
}

function myFunction(checkBox, text, textBox) {
    if (checkBox.checked == false){
        text.style.display = "inline";
        textBox.style.display = "none";
    } else {
		text.style.display = "none";
        textBox.style.display = "inline";
    }
}
</script>