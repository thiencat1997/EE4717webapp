<!DOCTYPE html>
<html lang="en">
    <head>
        <title>User Login/register</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="registerstyle.css">
        <script type = "text/javascript"  src = "form_validation.js" ></script>
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

    $connectdb = mysqli_select_db($conn, 'users');

?>


    <body>

          <nav>
    				<ul>
    						<li ><a href="index.html" style="text-align:left">
    							<img src="media/logo.png" height="100%" width= "100%">
    						</a> </li>


    					<strong>
    						<li style="float:right">	<a href="appointment.html">Appointment</a> </li>
    						<li style="float:right">	<a href="service.html">Service</a> </li>
    						<li style="float:right">	<a href="about.html">About</a> </li>
    						<li style="float:right">	<a href="index.html">Home</a> </li>
    					</strong>
    				</ul>
    			</nav>

            <header style="margin-left: 3%;">
                <h1>Membership Sign In/Up Form</h1>
            </header>
            <main>
              <div class="login">
                <h2>User Login</h2>

                  <form action="register.php" method="POST" id="login_form">
                    <div class="container ">
                        <div>
                          <label for="user">Username:</label>
                          <input type="text" name="user" id="user" required></input>
                        </div>
                        <div>
                          <label for="password">Password:</label>
                          <input type="password" name="password" id="password" required></input>
                        </div>
                        <a href="#">Forgot password?</a><br>
                        <a href="#">Forgot username?</a><br>
                        Remember me <input type="checkbox" checked="checked" name="remember" ></input><br>
                        <button type="submit" onsubmit="ShowAlert()" class="button" style="margin-left: 200px;">Login</button>
                        <?php

                        if (isset($_POST['user']) && isset($_POST['password'])){
                          $user=$_POST['user'];
                          $password=$_POST['password'];
                          $query="select * from users where Username='$user' and Password='$password'";
                          $run=mysqli_query($conn,$query);

                        if(mysqli_num_rows($run)>0) {
                            echo"<p>login successfully</p>";
                            //echo "<script> window.open('index.php','_self')</script>";
                            $message = "success";
                            //echo "<script type='text/javascript'>alert('$message');</script>";
                            //header("Location: ../status.html");
                            $_SESSION['user']=$user;
                        } else {
                            echo"<p>invalid username or password!</p>";
                            $message = "No";
                            //echo "<script type='text/javascript'>alert('$message');</script>";
                            //header("Location: ../register.php");
                        }
                        }

                        ?>

                    </div>
                  </form>

              </div>
              <div class="registeration">
                <h2>Registeration</h2>
                <div class="container">
                <form action="./php/newuser.php" method="POST" onsubmit="form_validate()" id="register_form">
                  <div>
                    <label for="title">Title:</label>
                    <select name="title" id="title">
                      <option value=null >--Select--</option>
                      <option value="Mr">Mr.</option>
                      <option value="Mrs">Mrs.</option>
                      <option value="Ms">Ms.</option>
                      <option value="Miss">Miss.</option>
                    </select>
                  </div>
                  <div>
                    <label for="firstname">*First Name:</label>
                    <input type="text" id="firstname" name="firstname" placeholder="Your First Name"
                    id="firstname" required onchange="FirstNameCheck()"></input>
                  </div>
                  <div>
                    <label for="lastname">*Last Name:</label>
                    <input type="text" id="lastname" name="lastname" placeholder="Your Last Name" required onchange="LastNameCheck()"></input>
                  </div>
                  <div>
                    <label for="username">*Username:</label>
                    <input type="text" id="username" name="username" placeholder="Choose a Username" required onchange="UsernameCheck()"></input>
                  </div>
                  <div>
                    <label for="pwd">*Password:</label>
                    <input type="password" id="pwd" name="pwd" placeholder="Choose a password"required ></input>
                  </div>
                  <div>
                    <label for="cpwd">*Confirm Password:</label>
                    <input type="password" id="cpwd" name="cpwd" placeholder="Confirm password" required onchange="PwdCheck()"></input>
                  </div>
                  <div>
                    <label for="email">*Email Address:</label>
                    <input type="email" id="email" name="email" placeholder="Your Email" required></input>
                  </div>
                  <div>
                    <label for="cemail">*Confirm Email:</label>
                    <input type="email" id="cemail" name="cemail" placeholder="Confirm Email" required onchange="EmailCheck()"></input>
                  </div>
                  <div>
                    <label for="phone">*Phone Number:</label>
                    <input type="text" id="phone" name="phone" placeholder="Your Phone Number" required onchange="PhoneCheck()"></input>
                  </div>
                  <button type="submit" onsubmit="ShowAlert()" class="button" style="margin-left: 270px;">Submit</button>

                </form>
              </div>
              </div>
            </main>

        <script src="form_validation.js"> </script>
        <div class="hero-image">
          <div class="container" style="padding-top: 50px">
          		  <div class="column">
        		  	<div class="column-left">
        			<ul>
        					<li ><a href="index.html" style="text-align:left">
        						<img src="media/logo.png" height="100%" width= "100%">
        					</a> </li>
        					</ul>
        			<p>The best quality private clinic, highest technology and service level with reasonable charge. Ensure health of every customer.
        			</p>
        			</div>
        		  </div>
        		  <div class="column">
        		  	<div class="column-middle" style="padding-top: 50px">


        		  		<div style="border:3px solid transparent; border-radius: 40px; padding-left: 30px; height:220px">
        		  			<h2 style="  display: inline-block;
        						  margin: 0;
        						  transform: translateY(-50%);
        						  background: #fff;
        						  padding: 0 .5em;">
          						Contact


         						 </h2>
         						<p>
        			  		<table class="footerTable">
        			  			<tr width=100px>
        			  				<td>Addtress</td>
        			  				<td>Mitlton Str. 26-27 London UK</td>
        			  			</tr>
        			  			<tr>
        			  				<td>Phone</td>
        			  				<td>+53 345 7953 32453 </td>
        			  			</tr>
        			  			<tr>
        			  				<td>Email</td>
        			  				<td>yourmail@gmail.com </td>
        			  			</tr>
        			  		</table>
        			  		</p>
        		  		</div>
        		  </div>
        		  </div>
        		  <div class="column">
        		  	<div class="column-right" style="padding-top: 50px">
        		  		<div style="border:3px solid #ccc; border-radius: 40px; padding-left: 30px; height:200px">
        		  			<h2 style="  display: inline-block;
        						  margin: 0;
        						  transform: translateY(-50%);
        						  background: #fff;
        						  padding: 0 .5em;">
          						Opening Hours


         						 </h2>
         						 <p>
        			  		<table class="footerTable">
        			  			<tr width=100px>
        			  				<td>Monday - Friday</td>
        			  				<td>5pm-7pm</td>
        			  			</tr>
        			  			<tr>
        			  				<td>Saturday - Sunday</td>
        			  				<td>5pm-7pm</td>
        			  			</tr>
        			  		</table>
        			  		</p>
        		  		</div>
        			  </div>
        		  </div>
          </div>
        </div>

    </body>
</html>
