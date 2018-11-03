<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$doctor=$_GET['doctor'];
$date=$_GET['date'];

include_once './db_connect.php';

$query ="SELECT * FROM doctors d LEFT JOIN
booking b ON d.SlotID = b.SlotID
WHERE d.DrName = '$doctor'
AND ( CAST(b.BookDate AS CHAR(10)) <> '$date' OR b.SlotID IS NULL)";

$result = mysqli_query($conn, $query);
$data = Array();

while ($row = mysqli_fetch_assoc($result)){
  array_push($data, $row['Timeslot']);
}

echo json_encode($data);
?>
