<?php
session_name("project");
session_start();
require('db.php');

$db  = mysqli_connect($servername,$username,$password,$database);
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$keyword = mysqli_real_escape_string($db,$_POST['keyword']);

$query3 = mysqli_multi_query($db,"call search_concert('$keyword')");
$result = mysqli_store_result($db);

$row3 = mysqli_fetch_assoc($result);
$concert = array(
  'concert_id' => $row3['concert_id'],
  'concert_name' => $row3['concert_name'],
  'name' => $row3['name'],
  'date' => $row3['date'],
  'time' => $row3['time'],
  'price' => $row3['ticket_price'],
  'availability' => $row3['availability'],
  'ticket_link' => $row3['ticket_link'],
  'venue_name' => $row3['venue_name'],
);

mysqli_free_result($result);
mysqli_next_result($db);

mysqli_close($db);
echo json_encode($concert);
?>