<?php
session_name("project");
session_start();
require('db.php');

$db  = mysqli_connect($servername,$username,$password,$database);
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$search_text = mysqli_real_escape_string($db,$_POST['search_text']);

    
$query3 = mysqli_multi_query($db,"call fetch_concert_list('$search_text')");
$result = mysqli_store_result($db);
$concert = array();
$i=0;
while($row3 = mysqli_fetch_assoc($result))
{
    $concert[$i]['concert_id'] = $row3['concert_id'];
    $concert[$i]['concert_name'] = $row3['concert_name'];
    $concert[$i]['genre_name'] = $row3['genre_name'];
    $concert[$i]['name'] = $row3['name'];
    $concert[$i]['date'] = $row3['date'];
    $concert[$i]['time'] = $row3['time'];
    $concert[$i]['location'] = $row3['venue_name'];
    $i++;
}
mysqli_free_result($result);
mysqli_next_result($db);
  

mysqli_close($db);
echo json_encode($concert);
?>