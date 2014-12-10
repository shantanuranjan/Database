<?php
session_name("project");
session_start();
require('db.php');

$db  = mysqli_connect($servername,$username,$password,$database);
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$user_id = mysqli_real_escape_string($db,$_POST['user_id']);

$query3 = mysqli_multi_query($db,"call user_post_concert('$user_id')");
$result = mysqli_store_result($db);
$concert = array();
$i=0;
while($row3 = mysqli_fetch_assoc($result))
{
    $concert[$i]['artist_name'] = $row3['artist_name'];
    $concert[$i]['concert_name'] = $row3['concert_name'];
    $concert[$i]['date'] = $row3['date'];
    $concert[$i]['time'] = $row3['time'];
    $concert[$i]['venue'] = $row3['venue'];
    $concert[$i]['price'] = $row3['price'];
    $concert[$i]['availability'] = $row3['availability'];
    $concert[$i]['link'] = $row3['link'];
    $concert[$i]['description'] = $row3['description'];
    $concert[$i]['username'] = $row3['username'];
    $i++;
}
mysqli_free_result($result);
mysqli_next_result($db);

mysqli_close($db);
echo json_encode($concert);
?>