<!DOCTYPE html>
<html>
    <head>
    	<title>MedArt Clinic</title>
    	  <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="bookstyle.css">
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
    else
      echo "connected successfully";
    $connectdb = mysqli_select_db($conn, 'f31ee');
    if (isset($_POST['doctor']) && isset($_POST['date'])){

    $doctor=$_POST['doctor'];
    $date=$_POST['date'];
    $query ="SELECT * FROM doctors d LEFT JOIN Booking b ON d.SlotID = b.SlotID WHERE d.DrName = '".$doctor."' AND b.Date = '".$date."' AND b.SlotID IS NULL;"
    $result = mysqli_query($conn, $query);
    }


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
      <header>
        <h1>Make an Appointment</h1>
      </header>
      <div class="book">
          <form>
            <div class="bookform">
              <div>
                <label for="service">Service:</label>
                <select name="service" id="service">

                  <option value=null >--Select--</option>
                  <option value="consultation">Medical Consultation</option>
                  <option value="routine">Routine Checkup</option>
                  <option value="comprehensive">Comprehensive Health Exam</option>
                </select>
              </div>
              <div>
                <label for="doctor">Doctor:</label>
                <select name="doctor" id="doctor">
                  <option value=null >--Select--</option>
                  <option value="A">Doctor A</option>
                  <option value="B">Doctor B</option>
                  <option value="C">Doctor C</option>
                </select>
              </div>
              <div>
                <label for="date">Date:</label>
                <input type="date" name="date" id="date" onchange="DateCheck()"></input>
                <script>
                function DateCheck(){
                    var date = Date.parse(document.getElementById('date').value);
                    var now = new Date();

                    if (date < now){
                        alert("Please enter a future date");
                        return false;
                    }
                }
                </script>
              </div>
              <div>
                <label for="time">Time slot:</label>
                <select name="time" id="time">
                  <?php
                  while ($rows = mysql_fetch_assoc($result)){
                      echo "<option value=". $rows['time'].";>".$rows['time'].";</option>"
                  }
                  ?>
                </select>
                <script type="text/javascript">
                  var time_picker = document.getElementById('time');
                  time_picker.addEventListener('mousedown', selectTime);
                  function init() {
                    var dropdown = document.createElement('ul');
                    dropdown.classList.add('time-picker-content');
                    var content = '';
                    for(var i=0; i<time_picker.children.length; i++) {
                      var value = time_picker.children[i].value;
                      var text = time_picker.children[i].text;
                      content += `<li data-value='${value}' onclick='updateTime(this)'>${text}</li>`;
                    }
                    dropdown.innerHTML = content;
                    time_picker.insertAdjacentElement('afterend', dropdown);
                    selectTime.innerHTML = '';
                  }
                  function updateTime(option) {
                    time_picker.value = option.dataset.value;
                  }
                  function selectTime(e) {
                    e.preventDefault();
                    e.target.classList.toggle('expanded');
                  }
                  init();
                </script>
              </div>
              <div>
                <label for="remarks">Remarks:</label>
                <input type="textarea" name="remarks" id="remarks" placeholder="Special notice to your doctor"></input>
              </div>
            <button type="submit" onsubmit="ShowAlert()" class="button" style="margin-left: 270px;">Submit</button>
            </div>
          </form>
      </div>
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
