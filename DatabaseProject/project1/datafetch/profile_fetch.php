<?php
session_name("TSM");
session_start();
require('db.php');
$db  = mysqli_connect($servername,$username,$password,$database);
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$user_id = mysqli_real_escape_string($db,$_POST['user_id']);

//personal information of user
$query2 = mysqli_multi_query($db,"call user_personal_information('$user_id')");
$result = mysqli_store_result($db);
$i=0;

$row = mysqli_fetch_assoc($result);
$user = array(
    'username' => $row['username'],
    'name' => $row['name'],
    'dob' => $row['date_of_birth'],
    'email' => $row['email'],
    'city' => $row['city'],
);

mysqli_free_result($result);
mysqli_next_result($db);
//
//User genre
$query3 = mysqli_multi_query($db,"call user_genre('$user_id')");
$result = mysqli_store_result($db);
$genre = array();
while($row3 = mysqli_fetch_assoc($result))
{
    $genre[$row3['genre_name']] = $row3['genre_name'];
}
mysqli_free_result($result);
mysqli_next_result($db);

//User_sub_genre list

$query4 = mysqli_multi_query($db,"call user_sub_genre('$user_id')");
$result = mysqli_store_result($db);
$sub_genre = array();
while($row3 = mysqli_fetch_assoc($result))
{
    $sub_genre[$row3['sub_genre_name']] = $row3['sub_genre_name'];
}
mysqli_free_result($result);
mysqli_next_result($db);



mysqli_close($db);
echo json_encode(array($user,$genre,$sub_genre));
?>