<?php
session_name("project");
session_start();
include('artist_header.php');
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="./css/datepicker.css" />
	<link rel="stylesheet" type="text/css" href="./css/bootstrap-timepicker.css" />
	<link rel="stylesheet" type="text/css" href="./css/project.css" />
	<link rel="stylesheet" type="text/css" href="./css/bootstrap-timepicker.min.css" />
  	<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
  	<script type="text/javascript" src="./js/bootstrap-datepicker.js"></script>
  	<script type="text/javascript" src="./js/bootstrap-timepicker.js"></script>
  	<script type="text/javascript" src="./js/bootstrap-timepicker.min.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function() {
    		jQuery('.tabs .tab-links a').on('click', function(e)  {
    			var currentAttrValue = jQuery(this).attr('href');
    			//alert(currentAttrValue);
    			jQuery('.tabs ' + currentAttrValue).show().siblings().hide();
    			jQuery(this).parent('li').addClass('active').siblings().removeClass('active');
    			 
    	        e.preventDefault();
    	});
	});
	</script>

</head>
<body>

</body>
<div class="container" style="text-align:center">
	<div class="recommended">
				
				
				<div class="public-rate-posts">
					<a href="#" class="list-group-item active text_label1" >
					   Public rate & review
					</a>
				</div>
				<div class="clearfix"></div>
	</div>

	<div class="post">
				<div class="form-group" style="text-align:left" >
					<label for="name" >What's on your mind ? : </label>
				 </div>
						<div class="tabs">
    						<ul class="tab-links">
        						<li class="active"><a href="#tab1"> Artist Profile</a></li>
        						<li><a href="#tab2">Add Concert</a></li>
							</ul>
							<div class="tab-content">
					
								<div id="tab1" class="tab active">
									<table class="table table-bordered post_artist">
										<thead>
											<tr><th colspan="2">Artist Information</th><tr>
											<tr><th colspan="2"><span id="errortext1"></span></th></tr>
										</thead>
										<tbody>
											<tr>
												<td>Username :</td><td><span id="post_artist_username">username</span></td>
											</tr>
											<tr>
												<td>Artist :</td><td><span id="post_artist_name">Artist</span></td>
											</tr>
											<tr>
												<td>Website :</td><td><span id="post_artist_website">www.website.com</span></td>
											</tr>
											<tr>
												<td>Genre :</td><td><span id="post_artist_genre">Genre</span></td>
											</tr>
											<tr>
												<td>Bio :</td><td><span id="post_artist_desc">This is going to b long</span></td>
											</tr>
											<tr>
												<td>Email  :</td><td><span id="post_artist_email">artist@artist.com</span></td>
											</tr>
											
										</tbody>
									</table>
								</div>
						 	
							 <div id="tab2" class="tab">
					 			<table class="table table-bordered add_concert">
										<thead>
											<tr><th colspan="2">Concert Information</th><tr>
											<tr><th colspan="2"><span id="errortext3"></span></th></tr>
										</thead>
										<tbody>
											<tr>
												<td>Concert :</td><td><input type="text" class="form-control" id="add_concert_name"  placeholder="Concert name" ></td>
											</tr>
											
											<tr>
												<td>Date :</td><td><input type="text" class="form-control" id="add_concert_date"  placeholder="Date" ></td>
											</tr>
											<tr>
												<td>Time :</td><td><input type="text" class="form-control" id="add_concert_time"  placeholder="Time" ></td>
											</tr>
											<tr>
												<td>Ticket Price :</td><td><input type="text" class="form-control" id="add_concert_price"  placeholder="Price" ></td>
											</tr>
											<tr>
												<td>Ticket link :</td><td><input type="text" class="form-control" id="add_concert_link"  placeholder="link" ></td>
											</tr>
											<tr>
												<td>Availability :</td><td><input type="text" class="form-control" id="add_concert_availability"  placeholder="Availability" ></td>
											</tr>
											<tr>
												<td>Venue  :</td><td><select id="add_concert_venue_name"></select></td>
											</tr>
											
											<tr>
												<td>Post Information :</td><td><input type="text" class="form-control" id="artist_post_info"  placeholder="Artist Information" ></td>
											</tr>
										</tbody>
									</table>
							 </div>
					</div>					
						<button type="button" class="btn btn-block btn-grey" id="post">
							Post
						</button>
				 </div>
				
				<div class="content">
					<ul class="list-group" id="post_list">
					   
					</ul>
				</div>
				<div class="clearfix"></div>
	</div>

	<div class="public-post">
					<div class="artist-concert">
					<a href="#" class="list-group-item active text_label1" >
					   Artist Concerts
					</a>
					<ul class="list-group" id="artist-concert">
					   
					</ul>
				</div>	
				<div class="clearfix"></div>
	</div>
</div>
<script type="text/javascript">
	$('.datepicker').datepicker();
	</script>
	<script type="text/javascript">
	$('.timepicker-default').timepicker();
	</script>
<script type="text/javascript" src="./js/artist_profile.js"></script>	
</html>