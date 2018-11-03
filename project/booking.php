<!DOCTYPE html>
<html>
    <head>
    	<title>MedArt Clinic</title>
    	  <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="bookstyle.css">
        <style media="screen">
          .container {
            position: relative;
            height: 1.5rem;
          }
          .expanded + .time-picker-content {
            display: flex;
          }
          .time-picker-content {
            margin: 0;
            list-style: none;
            display: none;
            justify-content: flex-start;
            flex-wrap: wrap;
            position: absolute;
            width: 30vw;
            top: 1.5rem;
            background: #EEE;
            padding: 1rem;
          }
          .time-picker-content li {
            display: inline-block;
            flex: 0 0 30%;
            margin: 10px 1.5%;
            padding: 10px;
            background: #999;
            box-sizing: border-box;
            text-align: center;
            font-size: 10px;
            cursor: pointer;
            user-select: none;
          }
        </style>
    </head>
<<<<<<< HEAD

<?php include_once './php/db_connect.php'; ?>

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
          <form action="./php/submitbook.php" method="POST" id="booking_form">
            <div class="bookform">
              <div>
                <label for="service">Service:</label>
                <select name="service" id="service">
=======
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
    
    $connectdb = mysqli_select_db($conn, 'f31ee');
    if (isset($_POST['doctor']) && isset($_POST['date'])){
      $doctor=$_POST['doctor'];
      $date=$_POST['date'];
      $query ="
        SELECT * FROM doctors d LEFT JOIN Booking b 
        ON d.SlotID = b.SlotID 
        WHERE d.DrName = '$doctor' AND b.Date = '$date' AND b.SlotID IS NULL;
      ";
      $result = mysqli_query($conn, $query);
    }


    ?>

    <body>
      <div class="banner-container-2" style="background-image: url('media/about-bg.png');">   
        <div style="width:1500px; margin: auto" >    
         <?php include_once 'subhtml/navbar.php'; ?>
          <div class="banner-text-2" style="width:100%">
            Make an Appointment
          </div>
        </div>
      </div>
      <div class="container">
        <div class="book ">
            <form>
              <div class="bookform">
                <div>
                  <label for="service">Service:</label>
                  <select name="service" id="service">
>>>>>>> 9c97d8e9a005c9a911513b5280b0773e19e5f73a

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

<<<<<<< HEAD
                    if (date < now){
                        alert("Please enter a future date");
                        return false;
                    }
                }
                </script>
              </div>
              <div>
                <label for="time">Time slot:</label>
                <select class="time-picker" name="time" id="time">
                  <option value="10:00-10:30">10:00-10:30</option>
                  <option value="10:30-1100">10:30-11:00</option>

                  <?php
                  if (isset($_POST['doctor']) && isset($_POST['date'])){

                      $doctor=$_POST['doctor'];
                      $date=$_POST['date'];

                      $query ="SELECT * FROM doctors d LEFT JOIN
                      booking b ON d.SlotID = b.SlotID
                      WHERE d.DrName = '".$doctor."'
                      AND ( CAST(b.Date AS CHAR(10)) <> '".$date."' OR b.SlotID IS NULL);";
                      $result = mysqli_query($conn, $query);
                      //$rowcount=mysqli_num_rows($result);
                      //$rows = mysql_fetch_assoc($result);
                      echo '<select class="time-picker" name="time" id="time">';
                      while ($rows = mysql_fetch_assoc($result)){

                        foreach($rows['Time'] as $timeslot) {
                              //echo '<option value=' .$rows['Time']. '>' . $rows['Time'] .'</option>';
                              echo '<option value=' .$timeslot. '>' . $timeslot .'</option>';
                          }
                      }
                      echo '</select>;'
                  }
                  ?>
                </select>
                <!---<script type="text/javascript">
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
                </script>--->
              </div>
              <div>
                <label for="remarks">Remarks:</label>
                <input type="textarea" name="remarks" id="remarks" placeholder="Special notice to your doctor"></input>
              </div>
            <button type="submit" onsubmit="ShowAlert()" class="button" style="margin-left: 270px;">Submit</button>
            </div>
          </form>
      </div>
      <?php include_once 'subhtml/footer.php'; ?>
=======
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
                        echo "<option value=". $rows['time'].";>".$rows['time'].";</option>";
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
      </div>
>>>>>>> 9c97d8e9a005c9a911513b5280b0773e19e5f73a

  <?php include_once 'subhtml/footer.php'; ?>


    </body>

</html>
