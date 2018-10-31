<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Clinic User Page</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="styles.css">
        <script type = "text/javascript"  src = "form_validation.js" ></script>
        <style>
            body {font-family:Verdana, Arial, sans-serif;
                  background-color: #9ebdef;
            }
            #wrapper { background-color: #b3c7e6;
                       color: #000066;
                       width: 80%;
                       margin: auto;
                       min-width:850px;
            }
            #leftcolumn { float: left;
                          width: 32%;
                          background-color: white;
            }
            #rightcolumn { margin-left: 35%;
                           background-color: #bfedef;
                           color: #000000;
            }
            .content {padding: 20px 20px 0 20px;
            }
            #floatright { margin: 10px;
                         float: right;
            }
            footer {font-size:70%;
                     text-align: center;
                     clear: right;
                     padding-bottom:20px;
            }
        </style>
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

        <div id="wrapper">
            <header>
                <h1>user registeration page</h1>
            </header>
            <div id="leftcolumn">
              <h2>User Login</h2>

                <form action="php/login.php" method="POST" id="login_form">
                  <div class="container">
                    <table>
                      <tr>
                        <td>Username:</td>
                        <td><input type="text" name="user" required></input></td>
                      </tr>
                      <tr>
                        <td>Password:</td>
                        <td><input type="password" name="pwd" required></input></td>
                      </tr>
                      <tr>
                        <td colspan="2">
                          <span class="pwd">
                            <a href="#">Forgot password?</a>
                          </span>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="2">
                          <span class="uname">
                            <a href="#">Forgot username?</a>
                          </span>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="2">
                          <input type="checkbox" checked="checked" name="remember"> Remember me
                          </span>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="2" align="right">
                          <input type="submit" name="login" value="Login" ></input>
                        </td>
                      </tr>
                    </table>
                  </div>
                </form>

            </div>
            <div id="rightcolumn">
              <h2>Registeration</h2>
              <form action="./php/newuser.php" method="POST" onsubmit="form_validate()" id="register_form">
                <table>
                  <tr>
                    <td>Title:</td>
                    <td>
                      <select name="title">
                        <option value=null >--Select--</option>
                        <option value="Mr">Mr.</option>
                        <option value="Mrs">Mrs.</option>
                        <option value="Ms">Ms.</option>
                        <option value="Miss">Miss.</option>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td>*First Name:</td>
                    <td><input type="text" id="firstname" name="firstname" required onchange="FirstNameCheck()"></input></td>
                  </tr>
                  <tr>
                    <td>*Last Name:</td>
                    <td><input type="text" id="lastname" name="lastname" required onchange="LastNameCheck()"></input></td>
                  </tr>
                  <tr>
                    <td>*Username:</td>
                    <td><input type="text" id="username" name="username" required onchange="UsernameCheck()"></input></td>
                  </tr>
                  <tr>
                    <td>*Password:</td>
                    <td><input type="password" id="pwd" name="pwd" required ></input></td>
                  </tr>
                  <tr>
                    <td>*Confirm Password:</td>
                    <td><input type="password" id="cpwd" name="cpwd" required onchange="PwdCheck()"></input></td>
                  </tr>
                  <tr>
                    <td>*Email Address:</td>
                    <td><input type="email" id="email" name="email" required></input></td>
                  </tr>
                  <tr>
                    <td>*Confirm Email:</td>
                    <td><input type="email" id="cemail" name="cemail" required onchange="EmailCheck()"></input></td>
                  </tr>
                  <tr>
                    <td>*Phone Number:</td>
                    <td><input type="text" id="phone" name="phone" required onchange="PhoneCheck()"></input></td>
                  </tr>
                  <tr>
                    <td colspan="2" align="right">
                      <input type="submit" name="register" value="register" form="register_form" onclick="ShowAlert()"></input>
                    </td>
                  </tr>
                </table>
              </form>
            </div>
        </div>
        <script src="form_validation.js"> </script>
    </body>
</html>
