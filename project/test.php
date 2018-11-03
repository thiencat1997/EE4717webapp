<div class="container">
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
  <div>
        <label for="time">Time</label>
        <select class="time-picker" name="time" id="time">
          <?php
           include_once './php/db_connect.php';
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

               while ($rows = mysql_fetch_assoc($result)){
                 foreach($rows['Time'] as $timeslot) {
                       //echo '<option value=' .$rows['Time']. '>' . $rows['Time'] .'</option>';
                       echo '<option value=' .$timeslot. '>' . $timeslot .'</option>';
                   }
               }
           }

          ?>
          <option value="1000">10:00-11:00</option>
          <option value="1100">11:00-12:00</option>
          <option value="1200">12:00-13:00</option>
          <option value="1300">13:00-14:00</option>
          <option value="1400">14:00-15:00</option>
          <option value="1500">15:00-16:00</option>
          <option value="1600">16:00-17:00</option>
          <option value="1700">17:00-18:00</option>
        </select>
  </div>
</div>

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
