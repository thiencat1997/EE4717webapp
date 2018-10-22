<?php
  // create short variable names
  $Qty3=$_POST['Qty3'];
  $Qty2=$_POST['Qty2'];
  $Qty1=$_POST['Qty1'];
  $radio3=$_POST['radio3'];
  $radio2=$_POST['radio2'];

  @ $db = new mysqli('localhost', 'f31ee', 'f31ee', 'f31ee');

  if (mysqli_connect_errno()) {
     echo "Error: Could not connect to database.  Please try again later.";
     exit;
  }

  if($Qty1>0){
	$sql = "INSERT INTO order_table (drinkid, quantity) VALUES (1,$Qty1)";
	$db->query($sql);
  }
  if($Qty2>0){
	if($radio2 == 'single'){
		$sql = "INSERT INTO order_table (drinkid, quantity) VALUES (2,$Qty2)";
	}
	else {
		$sql = "INSERT INTO order_table (drinkid, quantity) VALUES (3,$Qty2)";
	}
	$db->query($sql);
  }
  if($Qty3>0){
	if($radio3 == 'single'){
		$sql = "INSERT INTO order_table (drinkid, quantity) VALUES (4,$Qty3)";
	}
	else {
		$sql = "INSERT INTO order_table (drinkid, quantity) VALUES (5,$Qty3)";
	}
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
  page_redirect('menu.php');


?>
