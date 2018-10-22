<?php
  // create short variable names
  $editprice1=$_POST['editprice1'];
  $editprice2=$_POST['editprice2'];
  $editprice3=$_POST['editprice3'];
  $textBox1=$_POST['textBox1'];
  $textBox2=$_POST['textBox2'];
  $textBox3=$_POST['textBox3'];
  $textBox4=$_POST['textBox4'];
  $textBox5=$_POST['textBox5'];

  @ $db = new mysqli('localhost', 'f31ee', 'f31ee', 'f31ee');

  if (mysqli_connect_errno()) {
     echo "Error: Could not connect to database.  Please try again later.";
     exit;
  }

  if($editprice1){
	$sql = "UPDATE menu SET price=$textBox1 WHERE drinkid=1";
	echo $sql;
	$db->query($sql);
  }
  if($editprice2){
	$sql = "UPDATE menu SET price=$textBox2 WHERE drinkid=2";
	$db->query($sql);
	$sql = "UPDATE menu SET price=$textBox3 WHERE drinkid=3";
	$db->query($sql);
  }
  if($editprice3){
	$sql = "UPDATE menu SET price=$textBox4 WHERE drinkid=4";
	$db->query($sql);
	$sql = "UPDATE menu SET price=$textBox5 WHERE drinkid=5";
	$db->query($sql);
  }


  $result = 1;

  if ($result) {
      echo  $db->affected_rows." rows modified.";
  } else {
  	  echo "An error has occurred.";
  }
  function page_redirect($location)
 {
   echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$location.'">';
   exit; 
 }
 
  $db->close();
  page_redirect('price_update.php');


?>
