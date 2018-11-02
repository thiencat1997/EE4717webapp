<?php
	$string1 = "
	<div class='hero-image' style='background-image: url(media/subscribe-bg.png); height:400px' >
		<div class='container hero-text'>
			Sign Up to get discount and recieve latest medical news	<br><br>
			<a class='button' style='width: 400px; padding:20px; margin-left: 0' href='register.php'>
			Sign Up
			</a>
		</div>
	</div>
	";
	
	$string2 = "
	<div class='hero-image' style='background-image: url(media/subscribe-bg.png); height:400px' >
		<div class='container hero-text'>
			Book appoinment to beat the queue and get exclusive discount<br><br>
			<a class='button' style='width: 400px; padding:20px; margin-left: 0' href='booking.php'>
			Book Appoinment
			</a>
		</div>
	</div>
	";

    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }    
	if(empty($_SESSION['user'])){
		echo $string1;
	} else {
		echo $string2;
	}

?>