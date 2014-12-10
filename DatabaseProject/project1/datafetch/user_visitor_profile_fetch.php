<?php
session_name("project");
session_start();
require('db.php');

$db  = mysqli_connect($servername,$username,$password,$database);
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$user_id = mysqli_real_escape_string($db,$_POST['user_id']);

$query3 = mysqli_multi_query($db,"call search_user('$user_id')");
$result = mysqli_store_result($db);

$row3 = mysqli_fetch_assoc($result);
$user = array(
  'username' => $row3['username'],
  'name' => $row3['name'],
  'dob' => $row3['date_of_birth'],
  'email' => $row3['email'],
  'city' => $row3['city']    
);

mysqli_free_result($result);
mysqli_next_result($db);

mysqli_close($db);
echo json_encode($user);
?>