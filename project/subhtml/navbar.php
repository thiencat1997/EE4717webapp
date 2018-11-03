<link rel="stylesheet" href="styles.css">

<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
	if(!empty($_SESSION['user'])){
		$link = "status.php";
		$text = "Hi, ".$_SESSION['user']."!";

	} else{			
		$link = "register.php";
		$text = "Login";
	}
?>


<nav>
	<ul>
			<li ><a href="index.php" style="text-align:left; padding-top: 20px">
				<img src="media/logo.png" height="100%" width= "100%">
			</a> </li>
		  	<li style="float:right">


  <a class='button' href=' <?php echo $link ?> ' style='padding: 15px; width: 200px'><?php echo $text ?> </a>


		  	</li>

		<strong>
			<li style="float:right">	<a href="booking.php" style='width: 300px'>Book Appointment</a> </li>
			<li style="float:right">	<a href="service.php">Service</a> </li>
			<li style="float:right">	<a href="about.php">About</a> </li>
			<li style="float:right">	<a href="index.php">Home</a> </li>
		</strong>
	</ul>
</nav>