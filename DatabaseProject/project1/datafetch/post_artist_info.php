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
$website = mysqli_real_escape_string($db,$_POST['website']);
$genre = mysqli_real_escape_string($db,$_POST['genre']);
$description = mysqli_real_escape_string($db,$_POST['description']);
$email = mysqli_real_escape_string($db,$_POST['email']);
$info = mysqli_real_escape_string($db,$_POST['info']);

$query = "insert into user_post_artist(artist_name,url,email,bio,description,user_id,genre_name,username) values('$name','$website','$email','$description','$info','$user_id','$genre','$username')";
$result = mysqli_query($db,$query);
if($result){
    echo 1;
}else{
    echo 0;
}
mysqli_close($db);
?>