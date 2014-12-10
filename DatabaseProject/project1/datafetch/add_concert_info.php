<?php
session_name("project");
session_start();
require('db.php');
$db  = mysqli_connect($servername,$username,$password,$database);
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$user_id = mysqli_real_escape_string($db,$_POST['user_id']);
$username = mysqli_real_escape_string($db,$_POST['username']);
$name = mysqli_real_escape_string($db,$_POST['name']);
$artist_name = mysqli_real_escape_string($db,$_POST['artist_name']);
$date = mysqli_real_escape_string($db,$_POST['date']);
$time = mysqli_real_escape_string($db,$_POST['time']);
$price = mysqli_real_escape_string($db,$_POST['price']);
$availability = mysqli_real_escape_string($db,$_POST['availability']);
$ticket_link = mysqli_real_escape_string($db,$_POST['ticket_link']);
$venue = mysqli_real_escape_string($db,$_POST['venue']);

$query = "select artist_id from artist where name='$artist_name'";
$result = mysqli_query($db,$query);

$row = mysqli_fetch_assoc($result);
$artist_id = $row['artist_id'];

$query = "select venue_id from location where venue_name='$venue'";
$result = mysqli_query($db,$query);

$row = mysqli_fetch_assoc($result);
$venue_id = $row['venue_id'];

$datetime = $date." ".$time;

$query = "insert into concert(concert_name,artist_id,date_time,venue_id,ticket_price,availability,ticket_link,postedBy)
values('$name','$artist_id','$datetime','$venue_id','$price','$availability','$ticket_link','$username')";
$result = mysqli_query($db,$query);
if($result){
    echo 1;
}else{
    echo 0;
}
mysqli_close($db);
?>