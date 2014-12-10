<?php
session_name("project");
session_start();
require('db.php');
$db  = mysqli_connect($servername,$username,$password,$database);
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$user_id = mysqli_real_escape_string($db,$_POST['user_id']);
$genre = array();
$genre = $_POST['genre'];

$query = "delete from user_genre where user_id=".$user_id;
$result = mysqli_query($db,$query);

foreach($genre as $value){
   $query = "select genre_id from genre where genre_name='$value'";
   $result = mysqli_query($db,$query);
   $row = mysqli_fetch_assoc($result);
   $id = $row['genre_id'];
   
   $query = "insert into user_genre(user_id,genre_id) values('$user_id','$id')";
   $result = mysqli_query($db,$query);
}
if($result){
    echo 1;
}else{
    echo 0;
}

mysqli_close($db);
?>