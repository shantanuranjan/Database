<?php 
session_name("project");
session_start();
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
                  <script src="./js/artist_search_page.js"></script>
                
    </head>
    <body>
        <div class="container" style="text-align:center">
            <div class="content" style="width: 50%;margin: auto">
		<ul class="list-group" id="post_list">
			<li class="list-group-item border_list">
			    <table class="table-bordered tablefont">
				    <tr><th colspan="2" class="text_label1">Artist Information posted by Username</th></tr>
				    <tr><td>Artist:</td><td>The Artist</td></tr>
				    <tr><td>Genre:</td><td>Genre</td></tr>
			    </table>
			</li>		   
		</ul>
            </div>
        <div>
    
    
    </body>
</html>