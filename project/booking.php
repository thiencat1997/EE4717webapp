<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
    	<title>MedArt Clinic</title>
    	  <link rel="stylesheet" href="css/styles.css">
        <link rel="stylesheet" href="css/bookstyle.css">
        <style media="screen">
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
            width: 40vw;
            top: 6.5rem;
            background: #EEE;
            padding: 1rem;
            z-index: 1000;
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

<?php include_once './php/db_connect.php'; ?>

    <body>

      <div class="banner-container-2" style="background-image: url('media/about-bg.png');">   
        <div style="width:1500px; margin: auto" >    
         <?php include_once 'subhtml/navbar.php'; ?>
          <div class="banner-text-2" style="width:100%">
            Make an Appointment
          </div>
        </div>
      </div>
    <div style="width:1500px; margin: auto">
          <form action="./php/submitbook.php" method="POST" name="booking_form" class="bookform">
          <div style="margin:auto">
              <div class="elements">
                <label for="service">Service:</label>
                <select name="service" id="service">

                    <option value='' >--Select--</option>
                    <option value="consultation">Medical Consultation</option>
                    <option value="routine">Routine Checkup</option>
                    <option value="comprehensive">Comprehensive Health Exam</option>
                  </select>
                </div>
                <div class="elements">
                  <label for="doctor">Doctor:</label>
                  <select name="doctor" id="doctor">
                    <option value='' >--Select--</option>
                    <option value="A">Doctor A</option>
                    <option value="B">Doctor B</option>
                    <option value="C">Doctor C</option>
                  </select>
                </div>
                <div class="elements">
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
              <div class="elements" style="position: relative">
                <label for="time">Time slot:</label>
                <select class="time-picker" name="time" id="time">
                  <option value='' >--Select--</option>
                </select>
              </div>
              <div class="elements">
                <label for="remarks">Remarks:</label>
                <input type="textarea" name="remarks" id="remarks" placeholder="Special notice to your doctor"></input>
              </div>
              <div>
                <button type="submit" onsubmit="ShowAlert()" class="button"
                style="width:300px;padding:10px;margin-left: 550px">Submit</button>
              </div>
            </div>
          </form>
      </div>
<?php include_once 'subhtml/footer.php'; ?>

<script type="text/javascript">
  <?php
  if(isset($_SESSION['updated'])) {
    unset($_SESSION['updated']);
    echo "alert('Submitted');
    location.href = 'status.php';";
  };
   ?>
  var form = document.forms['booking_form'];
  var time_picker = form.time;
  form.date.addEventListener('change', updateSelect);
  form.doctor.addEventListener('change', updateSelect);
  time_picker.addEventListener('mousedown', selectTime);

  async function updateSelect() {
    if (!form.date.value || !form.doctor.value)
      return;

    var dropdown = document.createElement('ul');
    dropdown.classList.add('time-picker-content');
    var dropdown_content = '';
    var select_content = '';

    var req = await fetch(`./php/get_options.php?doctor=${form.doctor.value}&date=${form.date.value}`);
    var timeslots = await req.json();
    timeslots = timeslots.filter((v, i, a) => a.indexOf(v) == i).sort();
    for(var i=0; i<timeslots.length; i++) {
      select_content += `<option value='${timeslots[i]}'>${timeslots[i]}</option>`
      dropdown_content += `<li data-value='${timeslots[i]}' onclick='updateTime(this)'>${timeslots[i]}</li>`;
    }
    time_picker.innerHTML = select_content;
    dropdown.innerHTML = dropdown_content;
    time_picker.insertAdjacentElement('afterend', dropdown);
    // selectTime.innerHTML = '';
  }
  function updateTime(option) {
    time_picker.value = option.dataset.value;
    time_picker.classList.toggle('expanded');
  }
  function selectTime(e) {
    e.preventDefault();
    e.target.classList.toggle('expanded');
  }
</script>
    </body>
</html>
