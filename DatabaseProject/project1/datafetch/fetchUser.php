<?php
session_name("project");
session_start();
require('db.php');

$db  = mysqli_connect($servername,$username,$password,$database);
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$keyword = "%".mysqli_real_escape_string($db,$_POST['keyword'])."%";

$query3 = mysqli_multi_query($db,"call fetch_user('$keyword')");
$result = mysqli_store_result($db);
$user = array();
$i=0;
while($row3 = mysqli_fetch_assoc($result))
{
    $user[$i]['user_id'] = $row3['user_id'];
    $user[$i]['name'] = $row3['name'];
    $user[$i]['username'] = $row3['username'];
    $i++;
}
mysqli_free_result($result);
mysqli_next_result($db);

mysqli_close($db);
echo json_encode($user);
?>