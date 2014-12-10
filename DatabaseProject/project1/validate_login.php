<?php
session_name("project");
session_start();
include('db.php');
$db  = new mysqli($servername,$username,$password,$database);
if ($db->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$username = mysqli_real_escape_string($db,$_POST['username']);
$password = mysqli_real_escape_string($db,$_POST['password']);
$person = mysqli_real_escape_string($db,$_POST['person']);
$query = null;
if($person  == "user"){
$query = $db->prepare("select count(*) as count from user where username = ? and password = ?");
}else{
$query = $db->prepare("select count(*) as count from artist where username = ? and password = ?");
}
$count=0;
$query->bind_param('ss',$username,$password);
$query->execute();
$query->bind_result($value);

    if($query->fetch()){
      $count = $value;
    }
	
	if($count == 1){
			echo "true";
			
		} else{
			echo "false";
		}
$db->close();
?>