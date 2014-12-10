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
$query = null;
$result;
if($person  == "user"){
$query = $db->prepare("select count(*) as count from user where username = ?");
$count=0;
$query->bind_param('s',$username);
$query->execute();
$query->bind_result($value);

    if($query->fetch()){
      $count = $value;
    }
	
	if($count !=0){
		echo "username";
		exit;
	}
$query->close();	
$query = $db->prepare("select count(*) as count from user where email = ?");
$count=0;
$query->bind_param('s',$email);
$query->execute();
$query->bind_result($value);

    if($query->fetch()){
      $count = $value;
    }
	
	if($count != 0){
			echo "email";
			exit;
	}
$query->close();	
}else{

$query = $db->prepare("select count(*) as count from artist where username = ?");
$count=0;
$query->bind_param('s',$username);
$query->execute();
$query->bind_result($value);

    if($query->fetch()){
      $count = $value;
    }
	
	if($count !=0){
		echo "username";
		exit;
	}
$query->close();

$query = $db->prepare("select count(*) as count from artist where email = ?");
$count=0;
$query->bind_param('s',$email);
$query->execute();
$query->bind_result($value);

    if($query->fetch()){
      $count = $value;
    }
	
	if($count != 0){
			echo "email";
			exit;
	}
	
$query->close();
}
echo "true";

$db->close();
?>