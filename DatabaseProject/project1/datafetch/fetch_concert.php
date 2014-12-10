<?php
session_name("project");
session_start();
require('db.php');

$db  = mysqli_connect($servername,$username,$password,$database);
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$concert_id = mysqli_real_escape_string($db,$_POST['concert_id']);

$query3 = mysqli_multi_query($db,"call fetch_concert('$concert_id')");
$result = mysqli_store_result($db);

$row3 = mysqli_fetch_assoc($result);
$concert = array(
    'concert_id' => $row3['concert_id'],
    'concert_name' => $row3['concert_name'],
    'name' => $row3['name'],
    'genre_name' => $row3['genre_name'],
    'name' => $row3['name'],
    'date' => $row3['date'],
    'time' => $row3['time'],
    'venue_name' => $row3['venue_name'],
    'address' => $row3['address'],
    'city' => $row3['city'],
    'state' => $row3['state']
);

mysqli_free_result($result);
mysqli_next_result($db);
  

mysqli_close($db);
echo json_encode($concert);
?>