<?php
session_name("project");
session_start();
require('db.php');
$db  = mysqli_connect($servername,$username,$password,$database);
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$user_id = mysqli_real_escape_string($db,$_POST['user_id']);
$follow_id = mysqli_real_escape_string($db,$_POST['follow_id']);

$query = "select * from user_follows where user_id='$user_id' and follow_id='$follow_id'";
$result = mysqli_query($db,$query);
if(mysqli_num_rows($result)>0){
    echo 1;
}else{
    echo 0;
}
mysqli_close($db);
?>