<?php
session_name("TSM");
session_start();
require('db.php');
$db  = mysqli_connect($servername,$username,$password,$database);
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$artist_id = mysqli_real_escape_string($db,$_POST['artist_id']);

//personal information of user
$query2 = mysqli_multi_query($db,"call artist_personal_information('$artist_id')");
$result = mysqli_store_result($db);
$i=0;

$row = mysqli_fetch_assoc($result);
$user = array(
    'username' => $row['username'],
    'name' => $row['name'],
    'website' => $row['website'],
    'bio' => $row['description'],
    'email' => $row['email'],
);

mysqli_free_result($result);
mysqli_next_result($db);

$query = "select g.genre_name from genre g,artist_genre ag where ag.artist_id='$artist_id' and ag.genre_id = g.genre_id";
$result = mysqli_query($db,$query);
$row = mysqli_fetch_assoc($result);
$genre = $row['genre_name'];
$user['genre'] = $genre;
echo json_encode($user);
mysqli_close($db);
?>