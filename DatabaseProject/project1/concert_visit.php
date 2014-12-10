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
        <script type="text/javascript" src="./js/concert_visit.js"></script>                
    </head>
    <body>
        <div class="container" style="text-align:center">
            <div class="content" style="width: 50%;margin: auto">
		<ul class="list-group" id="post_list">
		    <li class="list-group-item border_list">
			<table class="table table-bordered tablefont adjust_table">
			    <tr><th colspan="2" class="text_label1">Concert Information</th></tr>
			    <tr><td>Concert:</td><td>Concert</td></tr>
			    <tr><td>Artist:</td><td>artist</td></tr>
                            <tr><td>Genre:</td><td>artist</td></tr>
                            <tr><td>Date:</td><td>artist</td></tr>
                            <tr><td>Time:</td><td>artist</td></tr>
                            <tr><td>Venue:</td><td>artist</td></tr>
                            <tr><td>Address:</td><td>artist</td></tr>
                            <tr><td>City:</td><td>artist</td></tr>
                            <tr><td>State:</td><td>artist</td></tr>
                            <tr>
                                <td colspan="2">
                                <button type="button" id="rsvp" class="btn btn-block btn-grey">
                                        RSVP 
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <button type="button" class="btn btn-block btn-grey" id="add_rec">
                                        Add to My Recommended List
                                    </button>
                                </td>
                            </tr>
			</table>
		    </li>		   
		</ul>
            </div>
        <div>
    
    
    </body>
</html>