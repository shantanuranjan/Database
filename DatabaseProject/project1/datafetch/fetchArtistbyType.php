<?php
session_name("project");
session_start();
require('db.php');

$db  = mysqli_connect($servername,$username,$password,$database);
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$search_text = mysqli_real_escape_string($db,$_POST['search_text']);
$search_type = mysqli_real_escape_string($db,$_POST['search_type']);


$query3 = mysqli_multi_query($db,"call fetch_artist_by_genre('$search_text')");
$result = mysqli_store_result($db);
$artist = array();
$i=0;
while($row3 = mysqli_fetch_assoc($result))
{
    $artist[$i]['artist_id'] = $row3['artist_id'];
    $artist[$i]['name'] = $row3['name'];
    $artist[$i]['genre'] = $row3['genre_name'];
    $i++;
}
mysqli_free_result($result);
mysqli_next_result($db);

mysqli_close($db);
echo json_encode($artist);
?>