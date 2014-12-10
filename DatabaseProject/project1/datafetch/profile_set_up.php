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
$dob = mysqli_real_escape_string($db,$_POST['dob']);
$email = mysqli_real_escape_string($db,$_POST['email']);
$city = mysqli_real_escape_string($db,$_POST['city']);

//personal information of user
$query = "update user set username='$username',name='$name',date_of_birth='$dob',email='$email',city='$city' where user_id = '$user_id'";
$result = mysqli_query($db,$query);
if($result){
    echo 1;
}else{
    echo 0;
}
mysqli_close($db);
?>