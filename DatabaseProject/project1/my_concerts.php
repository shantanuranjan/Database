<?php
session_name("project");
session_start();
include('header.php');
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script type="text/javascript" src="./js/my_concerts.js"></script>
</head>
<body>

</body>
<div class="container" style="text-align:center">
	<div style="width: 40%;float: left;margin: auto" class="allshadow change_table">
		<table class="table table-bordered" id="attended_concerts_table">
			    <thead>
			       <tr>
				  <th colspan="4" class="text_label1"><h3>Concerts Attended</h3></th>
			       </tr>
                               <tr>
                                <th>Concert Name</th><th>Artist Name</th><th>Date</th><th>Location</th>
                                </tr>
			    </thead>
			    <tbody>
			    </tbody>
			</table>		
	</div>
	<div style="width: 40%;float: right;margin: auto" class="allshadow change_table">
			<table class="table table-bordered tablefont" id="recommended_concerts_table">
			    <thead>
			       <tr>
				  <th colspan="4" class="text_label1"><h3>My Recommended Concert's List</h3></th>
			       </tr>
                               <tr>
                                <th>Concert Name</th><th>Artist Name</th><th>Date</th><th>Location</th>
                                </tr>
			    </thead>
			    <tbody>
			    </tbody>
			</table>	
	</div>
        <div class="allshadow change_table" style="width: 60%;margin: auto">
			<table class="table table-bordered tablefont">
			    <thead>
			       <tr>
				  <th colspan="6" class="text_label1"><h3>Rate and Review</h3></th>
			       </tr>
                               <tr>
                                <th>Concert Name</th><th>Artist Name</th><th>Date</th><th>Rate</th><th>Review</th><th>Post</th>
                                </tr>
			    </thead>
                            <tr>
                                <td><span id="concert_name">Concert Name</span></td>
                                <td><span id="artist_name">Artist Name</span></td>
                                <td><span id="date">Date</span></td>
                                <td><input type="text" class="form-control" id="rate"  placeholder="10" ></td>
                                <td><input type="text" class="form-control" id="review"  placeholder="review" ></td>
                                <td><button type="button" class="btn btn-primary btn-grey" id="post" style="width: 100%">Post</button></td>
                            </tr>
			    <tbody>
			    </tbody>
			</table>	
	</div>
        <div class="allshadow change_table" style="width: 60%;margin: auto">
			<table class="table table-bordered tablefont" id="rate_review_table">
			    <thead>
			       <tr>
                                <th>Concert Name</th><th>Artist Name</th><th>Date</th><th>Rate</th><th>Review</th>
                                </tr>
			    </thead>
			    <tbody>
			    </tbody>
			</table>	
	</div>
</div>
</html>