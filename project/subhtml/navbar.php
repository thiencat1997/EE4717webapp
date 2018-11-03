<link rel="stylesheet" href="styles.css">
<style type="text/css">
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    width: 300px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
    margin-left: -55px;
}

li.dropdown {
    display: inline-block;
}
ul{
    overflow: hidden;
}
.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
    display: block;
}
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}
.dropdown-content a 	{
    color: black;
    padding: 15px 15px;
    text-decoration: none;
    display: block;
    text-align: left;
    width: 270px;
}


</style>

<?php
    if(!isset($_SESSION))
    {
        session_start();
    }
	if(!empty($_SESSION['user'])){
		$link = "status.php";
		$text = "Hi, ".$_SESSION['user']."!";
		$var =1;

	} else{
		$link = "register.php";
		$text = "Login";
		$var =0;
	}
  function phpAlert() {
    echo '<script type="text/javascript">alert("Please login first!")</script>';
  }

?>


<nav>
	<ul>
			<li ><a href="index.php" style="text-align:left; padding-top: 20px">
				<img src="media/logo.png" height="100%" width= "100%">
			</a> </li>
<?php
	if  ($var==1){
		echo "
				<li style='float:right' class='dropdown'>
			    <a href='javascript:void(0)' class='dropbtn button' style='padding: 15px; width: 200px;margin-right: 0'>
			    $text
			    </a>
			    <div class='dropdown-content'>
			      <a href='$link'>Appoinment Status</a>
			      <a href='logout.php'>Log Out</a>
			    </div>
			  </li>
		";
	} else {
		echo "
		<li style='float:right'>
		<a class='button' href='$link' style='padding: 15px; width: 200px'>$text</a>
		</li>
		";
	}

?>
		  	</li>

		<strong>
			<li style="float:right; width:300px">
        <?php
        if(empty($_SESSION['user'])){
          //phpAlert();
          echo '<a href="javascript:void(0);" style="width:300px;">Book Appointment</a>';
        }else{
          echo '<a href="booking.php" style="width:300px;">Book Appointment</a>';}
        ?>



      </li>
			<li style="float:right">	<a href="service.php">Service</a> </li>
			<li style="float:right">	<a href="about.php">About</a> </li>
			<li style="float:right">	<a href="index.php">Home</a> </li>
		</strong>
	</ul>
</nav>
