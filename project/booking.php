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

  <?php include_once 'subhtml/footer.php'; ?>


    </body>

</html>
