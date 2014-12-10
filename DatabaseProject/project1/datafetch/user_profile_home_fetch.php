<?php
session_name("project");
session_start();
require('db.php');
$db  = mysqli_connect($servername,$username,$password,$database);
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$user_id = mysqli_real_escape_string($db,$_POST['user_id']);

//Recommended artist
$query2 = mysqli_multi_query($db,"call recommend_artist($user_id)");
$result = mysqli_store_result($db);
$i=0;
$recommended_artist = array();
while($row = mysqli_fetch_assoc($result)){
    $recommended_artist[$i]['artist_id'] = $row['artist_id'];
    $recommended_artist[$i]['name'] = $row['name'];
    $recommended_artist[$i]['website'] = $row['website'];
    $i++;
}
mysqli_free_result($result);
mysqli_next_result($db);

//Recommended concerts by users
$query3 = mysqli_multi_query($db,"call recommend_concerts($user_id)");
$result = mysqli_store_result($db);
$recommended_concert = array();
$i=0;
while($row3 = mysqli_fetch_assoc($result))
{
    $recommended_concert[$i]['concert_id'] = $row3['concert_id'];
    $recommended_concert[$i]['concert_name'] = $row3['concert_name'];
    $recommended_concert[$i]['artist_name'] = $row3['name'];
    $recommended_concert[$i]['date'] = $row3['date_time'];
    $i++;
}
mysqli_free_result($result);
mysqli_next_result($db);


//User concerts post
$query4 = mysqli_multi_query($db,"call user_concert_posts($user_id)");
$result = mysqli_store_result($db);
$user_concert_posts = array();
$i=0;
while($row3 = mysqli_fetch_assoc($result))
{
    $user_concert_posts[$i]['concert_name'] = $row3['concert_name'];
    $user_concert_posts[$i]['date'] = $row3['date'];
    $user_concert_posts[$i]['time'] = $row3['time'];
    $user_concert_posts[$i]['venue'] = $row3['venue'];
    $user_concert_posts[$i]['price'] = $row3['price'];
    $user_concert_posts[$i]['availability'] = $row3['availability'];
    $user_concert_posts[$i]['link'] = $row3['link'];
    $user_concert_posts[$i]['description'] = $row3['description'];
    $user_concert_posts[$i]['username'] = $row3['username'];
    $user_concert_posts[$i]['artist_name'] = $row3['artist_name'];
    $i++;
}
mysqli_free_result($result);
mysqli_next_result($db);

//Artist concert posts
$query4 = mysqli_multi_query($db,"call artist_concert_posts($user_id)");
$result = mysqli_store_result($db);
$artist_concert_posts = array();
$i=0;
while($row3 = mysqli_fetch_assoc($result))
{
    $artist_concert_posts[$i]['concert_name'] = $row3['concert_name'];
    $artist_concert_posts[$i]['date'] = $row3['date'];
    $artist_concert_posts[$i]['time'] = $row3['time'];
    $artist_concert_posts[$i]['venue'] = $row3['venue'];
    $artist_concert_posts[$i]['price'] = $row3['price'];
    $artist_concert_posts[$i]['availability'] = $row3['availability'];
    $artist_concert_posts[$i]['link'] = $row3['link'];
    $artist_concert_posts[$i]['description'] = $row3['description'];
    $artist_concert_posts[$i]['artist_id'] = $row3['artist_id'];
    $artist_concert_posts[$i]['artist_name'] = $row3['artist_name'];
    $i++;
}
mysqli_free_result($result);
mysqli_next_result($db);

//Artist related post
$query4 = mysqli_multi_query($db,"call artist_related_post($user_id)");
$result = mysqli_store_result($db);
$user_post_artist = array();
$i=0;
while($row3 = mysqli_fetch_assoc($result))
{
    $user_post_artist[$i]['artist_name'] = $row3['artist_name'];
    $user_post_artist[$i]['url'] = $row3['url'];
    $user_post_artist[$i]['email'] = $row3['email'];
    $user_post_artist[$i]['bio'] = $row3['bio'];
    $user_post_artist[$i]['description'] = $row3['description'];
    $user_post_artist[$i]['user_id'] = $row3['user_id'];
    $user_post_artist[$i]['username'] = $row3['username'];
    $i++;
}
mysqli_free_result($result);
mysqli_next_result($db);


//rate & review post
$query4 = mysqli_multi_query($db,"call concert_rate_review('$user_id')");
$result = mysqli_store_result($db);
$concert_rate_review = array();
$i=0;
while($row3 = mysqli_fetch_assoc($result))
{
    $concert_rate_review[$i]['concert_id'] = $row3['concert_id'];
    $concert_rate_review[$i]['concert_name'] = $row3['concert_name'];
    $concert_rate_review[$i]['user_id'] = $row3['user_id'];
    $concert_rate_review[$i]['username'] = $row3['username'];
    $concert_rate_review[$i]['rating'] = $row3['rating'];
    $concert_rate_review[$i]['review'] = $row3['review'];
    $i++;
}

mysqli_free_result($result);
mysqli_next_result($db);

mysqli_close($db);
echo json_encode(array($recommended_artist,$recommended_concert,$user_concert_posts,$artist_concert_posts,$user_post_artist,$concert_rate_review));
?>