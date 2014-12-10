<?php
session_name("project");
session_start();
require('db.php');
$db  = mysqli_connect($servername,$username,$password,$database);
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$artist_id = mysqli_real_escape_string($db,$_POST['artist_id']);

$query4 = mysqli_multi_query($db,"call artist_past_concert('$artist_id')");
$result = mysqli_store_result($db);
$artist_past_concert = array();
$i=0;
while($row3 = mysqli_fetch_assoc($result))
{
    
    $artist_past_concert[$i]['concert_name'] = $row3['concert_name'];
    $artist_past_concert[$i]['venue_name'] = $row3['venue_name'];
    $artist_past_concert[$i]['city'] = $row3['city'];
  
    $i++;
}

mysqli_free_result($result);
mysqli_next_result($db);

mysqli_close($db);
echo json_encode($artist_past_concert);
?>