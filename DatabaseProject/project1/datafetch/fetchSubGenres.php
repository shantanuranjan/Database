<?php
session_name("TSM");
session_start();
require('db.php');
$db  = mysqli_connect($servername,$username,$password,$database);
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$genre= mysqli_real_escape_string($db,$_POST['genre']);

//User_sub_genre list

$query = mysqli_multi_query($db,"call genre_sub('$genre')");
$result = mysqli_store_result($db);
$i=0;
while($row3 = mysqli_fetch_assoc($result))
{
    $sub_genre[$i]['sub_genre'] = $row3['sub_genre_name'];
    $i++;
}
mysqli_free_result($result);
mysqli_next_result($db);


mysqli_close($db);
echo json_encode($sub_genre);
?>