<?php
session_name("project");
session_start();
require('db.php');
$db  = mysqli_connect($servername,$username,$password,$database);
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$user_id = mysqli_real_escape_string($db,$_POST['user_id']);


$query4 = mysqli_multi_query($db,"call myArtist('$user_id')");
$result = mysqli_store_result($db);
$myartist = array();
$i=0;
while($row3 = mysqli_fetch_assoc($result))
{
    
    $myartist[$i]['name'] = $row3['name'];
    $myartist[$i]['website'] = $row3['website'];
    $myartist[$i]['genre_name'] = $row3['genre_name'];
    $myartist[$i]['description'] = $row3['description'];
    $myartist[$i]['email'] = $row3['email'];
    
  
    $i++;
}

mysqli_free_result($result);
mysqli_next_result($db);

mysqli_close($db);
echo json_encode($myartist);
?>