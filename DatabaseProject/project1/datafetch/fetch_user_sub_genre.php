<?php
session_name("TSM");
session_start();
require('db.php');
$db  = mysqli_connect($servername,$username,$password,$database);
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$user_id= mysqli_real_escape_string($db,$_POST['user_id']);

//User_sub_genre list

$query = mysqli_multi_query($db,"call fetch_user_sub_genre('$user_id')");
$result = mysqli_store_result($db);
$i=0;
$genre = array();
while($row3 = mysqli_fetch_assoc($result))
{
    $genre[$row3['genre']] = $row3['genre'];
    $i++;
}
mysqli_free_result($result);
mysqli_next_result($db);


mysqli_close($db);
echo json_encode($genre);
?>