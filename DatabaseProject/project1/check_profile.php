<?php
session_name("project");
session_start();
include('db.php');

// Create connection
$db = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}


$username = mysqli_real_escape_string($db,$_POST['username']);
$person = mysqli_real_escape_string($db,$_POST['person']);

if($person=="user"){
$sql = "select * from user where username='$username'";
$result = mysqli_query($db, $sql);

    $row = mysqli_fetch_assoc($result);
	$data = array(
			'user_id' => $row['user_id'],
			'name' => $row['name'],
			'username' => $row['username'],
			'dob' => $row['date_of_birth'],
			'city' => $row['city'],
			'trust_score' => $row['trust_score'],
	);
	
$_SESSION['user_id'] = $data['user_id'];


mysqli_free_result($result);
mysqli_next_result($db);
}else{

$sql = "select * from artist where username='$username'";
$result = mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($result);
	$data = array(
			'artist_id' => $row['artist_id'],
			'name' => $row['name'],
			'website' => $row['website'],
			'description' => $row['description'],
	);


	$_SESSION['artist_id'] = $data['artist_id'];
	
mysqli_free_result($result);
mysqli_next_result($db);

}   
echo json_encode($data);
mysqli_close($db);
?>