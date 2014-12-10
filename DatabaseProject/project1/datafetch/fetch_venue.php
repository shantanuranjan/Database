<?php
session_name("TSM");
session_start();
require('db.php');
$db  = mysqli_connect($servername,$username,$password,$database);
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


//User_sub_genre list

$query = mysqli_multi_query($db,"call fetch_venue");
$result = mysqli_store_result($db);
$i=0;
$genre = array();
while($row3 = mysqli_fetch_assoc($result))
{
    $genre[$i]['venue_id'] = $row3['venue_id'];
    $genre[$i]['venue_name'] = $row3['venue_name'];
    $i++;
}
mysqli_free_result($result);
mysqli_next_result($db);


mysqli_close($db);
echo json_encode($genre);
?>