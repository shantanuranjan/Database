<?php
session_name("project");
session_start();
require('db.php');

$db  = mysqli_connect($servername,$username,$password,$database);
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$user_id = mysqli_real_escape_string($db,$_POST['user_id']);

$query3 = mysqli_multi_query($db,"call user_post_artist('$user_id')");
$result = mysqli_store_result($db);
$artist = array();
$i=0;
while($row3 = mysqli_fetch_assoc($result))
{
    $artist[$i]['artist_name'] = $row3['artist_name'];
    $artist[$i]['url'] = $row3['url'];
    $artist[$i]['email'] = $row3['email'];
    $artist[$i]['bio'] = $row3['bio'];
    $artist[$i]['description'] = $row3['description'];
    $artist[$i]['username'] = $row3['username'];
    $artist[$i]['genre_name'] = $row3['genre_name'];
    $i++;
}
mysqli_free_result($result);
mysqli_next_result($db);

mysqli_close($db);
echo json_encode($artist);
?>