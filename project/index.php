<!DOCTYPE html>
<html>
<head>
	<title>MedArt Clinic</title>
	  <link rel="stylesheet" href="css/styles.css">
</head>
<style>
img{
	height:100%;
	width:100%;
}


</style>
<body>
	<div class="banner-container" style="background-image: url('media/elements-bg.png');">
		<div style="width:1500px; margin: auto" >

		<?php include_once 'subhtml/navbar.php'; ?>

		  <div class="banner-text">
			<h1 style="line-height: 1.5em;">The Best </br> Medical Services</h1>
			<p class="">Medart Clinic is a primary healthcare clinic providing medical services for acute & chronic care, corporate healthcare, employment checkups, health screening and vaccination for adults and children. employment checkups, health screening and vaccination for adults and children.

		  	</p>
		  	<a href="about.php" class="boxhead">
			  	<div class='button' style="width: 400px; padding:20px; margin-left: 0">
			  		Learn more
			  	</div>
		  	</a>
		  	  </div>
		</div>
	</div>
		<br>

<div class="container" style="background:transparent; padding-bottom:80px; height: 700px;">
<br>
		  <div class="column">
		  	<div class="column-left">
				<img src="media/news-1.png">
			<a class="boxhead" href="about.php"><h2>About Us</h2></a>
			<p>MedArt Clinic is a family-owned clinic aiming at serving the best of the society. It was founded in Singapore in 2018, with the high-class equipment and best quality services.
			</p>
			</div>
		  </div>
		  <div class="column">
		  	<div class="column-middle">
				<img src="media/news-2.png" height="100%" width= "100%">
			<a class="boxhead" href="service.php"><h2>Services</h2></a>
			<p>Our services include medical consultation and prescriptions, routine medical checkup and comprehensive health exam. We fully support corporate medical examination, medical certificates and referral to the hospitals.
			</p>
		  </div>
		  </div>
		  <div class="column">
		  	<div class="column-right">
				<img src="media/news-3.png" height="100%" width= "100%">
				<a class="boxhead" href="booking.php"><h2>Appointment</h2></a>
				<p>Patients can make appointments through our website and check the status at their convenience. They can easily check and modify their appointments through our system.
				</p>
			  </div>
		  </div>
</div>


<?php include_once 'subhtml/signUpBanner.php'; ?>

<?php include_once 'subhtml/footer.php'; ?>

</body>
</html>
