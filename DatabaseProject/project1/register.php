<?php
session_name("project");
session_start();
include('db.php');
$db  = new mysqli($servername,$username,$password,$database);
if ($db->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$username = mysqli_real_escape_string($db,$_POST['username']);
$email = mysqli_real_escape_string($db,$_POST['email']);
$person = mysqli_real_escape_string($db,$_POST['person']);
$password = mysqli_real_escape_string($db,$_POST['password']);

$query = null;
$result;
if($person  == "user"){
$query = $db->prepare("insert into user(username,email,password) values(?,?,?)");
$count=0;
$query->bind_param('sss',$username,$email,$password);
	if($query->execute() == false){
		echo "New User creation failed";
	}
	$query->close();
}else{
$query = $db->prepare("insert into artist(username,email,password) values(?,?,?)");
$count=0;
$query->bind_param('sss',$username,$email,$password);
	if($query->execute() == false){
		echo "New artist creation failed";
	}
	$query->close();
}
$db->close();
?>