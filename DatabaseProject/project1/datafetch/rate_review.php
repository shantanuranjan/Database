<?php
session_name("project");
session_start();
require('db.php');
$db  = mysqli_connect($servername,$username,$password,$database);
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$user_id = mysqli_real_escape_string($db,$_POST['user_id']);
$concert_id = mysqli_real_escape_string($db,$_POST['concert_id']);
$rate = mysqli_real_escape_string($db,$_POST['rate']);
$review = mysqli_real_escape_string($db,$_POST['review']);

$query = "insert into concert_review(concert_id,user_id,rating,review) values('$concert_id','$user_id','$rate','$review')";
$result = mysqli_query($db,$query);

if($result){
	$query = "update user set trust_score = trust_score+1 where user_id=".$user_id;
	$result = mysqli_query($db,$query);
	if($result){
	echo 1;
	}else{
		echo 0;
	}
}else{
    echo 0;
}
mysqli_close($db);
?>