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
    session_start();
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
      <div class="banner-container-2" style="background-image: url('media/about-bg.png');">   
        <div style="width:1500px; margin: auto" >    
         <?php include_once 'subhtml/navbar.php'; ?>
          <div class="banner-text-2" style="width:100%">
            Membership Sign In/Up Form
          </div>
        </div>
      </div>
      <div style="width:1500px; margin: auto;" >
          <header>
              <h1></h1>
          </header>
          <main>
            <div class="login">
              <h2>User Login</h2>

                <form action="register.php" method="POST" id="login_form">
                  <div class="container3">
                      <div>
                        <label for="user">Username:</label>
                        <input type="text" name="user" id="user" required ></input>
                      </div>
                      <div>
                        <label for="password">Password:</label>
                        <input type="password" name="password" id="password" required></input>
                      </div>
                      <a href="#">Forgot password?</a><br>
                      <a href="#">Forgot username?</a><br>
                      Remember me <input type="checkbox" checked="checked" name="remember" ></input><br>
                      <button type="submit" onsubmit="ShowAlert()" class="button" style="float: right">Login</button>
                      <?php

                      if (isset($_POST['user']) && isset($_POST['password'])){
                        $user=$_POST['user'];
                        $password=$_POST['password'];
                        $hash= password_hash( $password , PASSWORD_DEFAULT );
                        $query="select * from users where Username='$user'";
                        $run=mysqli_query($conn,$query);
                        /*
                        if( password_verify($password, $hashed_password) )
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
                        */
                        if ( mysqli_num_rows($run) > 0) {
                          // output data of each row
                          while($row = mysqli_fetch_assoc($run)) {
                            $hashed_password = $row['Password'];
                            if( password_verify($password, $hashed_password) ){
                              echo "<p>login successfully</p>";
                              $message = "success";
                              $_SESSION['user']=$user;
                              echo "I am = $user";
                              echo $_SESSION['user'];
                              break;
                            } else {
                              echo"<p>invalid password!</p>";
                            }
                          }
                        } else {
                          echo"<p>invalid username!</p>";
                        }

                      }

                      ?>

                  </div>
                </form>
            </div>
            <div class="registeration">
              <h2>Registeration</h2>
              <div class="container3">
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
                <br>
                <button type="submit" onsubmit="ShowAlert()" class="button" style="float: right">Submit</button>

              </form>
            </div>
          </main>
      </div>

        <script src="form_validation.js"> </script>

        <?php include_once 'subhtml/footer.php'; ?>

    </body>
</html>
