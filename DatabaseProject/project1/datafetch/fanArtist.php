<?php
session_name("project");
session_start();
require('db.php');
$db  = mysqli_connect($servername,$username,$password,$database);
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$user_id = mysqli_real_escape_string($db,$_POST['user_id']);
$artist_id = mysqli_real_escape_string($db,$_POST['artist_id']);

$query = "insert into user_fan(user_id,artist_id) values('$user_id','$artist_id')";
$result = mysqli_query($db,$query);
if($result){
    echo 1;
}else{
    echo 0;
}
mysqli_close($db);
?>