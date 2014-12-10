<?php
session_name("project");
session_start();
require('db.php');
$db  = mysqli_connect($servername,$username,$password,$database);
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$artist_id = mysqli_real_escape_string($db,$_POST['artist_id']);
$username = mysqli_real_escape_string($db,$_POST['username']);
$name = mysqli_real_escape_string($db,$_POST['name']);
$website = mysqli_real_escape_string($db,$_POST['website']);
$bio = mysqli_real_escape_string($db,$_POST['bio']);
$email = mysqli_real_escape_string($db,$_POST['email']);
$genre = mysqli_real_escape_string($db,$_POST['genre']);

$query = "select genre_id from genre where genre_name='$genre'";
$result = mysqli_query($db,$query);
$row = mysqli_fetch_assoc($result);
$genre_id = $row['genre_id'];
//personal information of user
$query = "update artist set username='$username',name='$name',website='$website',email='$email',description='$bio' where artist_id = '$artist_id'";
$result = mysqli_query($db,$query);
if($result){
    $query = "insert into artist_genre(artist_id,genre_id) values('$artist_id','$genre_id')";
	$result = mysqli_query($db,$query);
	if($result){
		echo 1;
	}
}else{
    echo 0;
}
mysqli_close($db);
?>