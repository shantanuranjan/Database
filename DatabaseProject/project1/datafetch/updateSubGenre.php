<?php
session_name("project");
session_start();
require('db.php');
$db  = mysqli_connect($servername,$username,$password,$database);
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$user_id = mysqli_real_escape_string($db,$_POST['user_id']);
$sub_genre = array();
$sub_genre = $_POST['sub_genre'];

$query = "delete from user_sub_genre where user_id=".$user_id;
$result = mysqli_query($db,$query);

foreach($sub_genre as $value){
   $query = "select sub_genre_id from sub_genre where sub_genre_name='$value'";
   $result = mysqli_query($db,$query);
   $row = mysqli_fetch_assoc($result);
   $id = $row['sub_genre_id'];
   
   $query = "insert into user_sub_genre(user_id,sub_genre_id) values('$user_id','$id')";
   $result = mysqli_query($db,$query);
}
if($result){
    echo 1;
}else{
    echo 0;
}

mysqli_close($db);
?>