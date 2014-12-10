<?php 

if(isset($_SESSION['user_id']))
{
	include('header.php');
}
else 
{
	include('artist_header.php');
}

?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                 <script src="./js/genre_search_page.js"></script>
    </head>
    <body>
        <div class="container" style="text-align:center">
            <div class="content" style="width: 50%;margin: auto">
		<ul class="list-group" id="post_list">
					   
		</ul>
            </div>
        <div>
    
    
    </body>
</html>