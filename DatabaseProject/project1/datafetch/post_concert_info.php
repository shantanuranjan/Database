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
$info = mysqli_real_escape_string($db,$_POST['info']);

$query = "insert into user_post_concert(artist_name,concert_name,date,time,venue,price,availability,link,description,user_id,username) values('$artist_name','$name','$date','$time','$venue','$price','$availability','$ticket_link','$info','$user_id','$username')";
$result = mysqli_query($db,$query);
if($result){
    echo 1;
}else{
    echo 0;
}
mysqli_close($db);
?>