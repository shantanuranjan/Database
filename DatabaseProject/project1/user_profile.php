<?php
session_name("project");
session_start();
include('header.php');
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
    		jQuery('.tabs .tab-links a').on('click', function(e){
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
				<div class="recommended-artist">
				<a href="#" class="list-group-item active text_label1">
				   Recommended artist
				</a>
				<a href="#" class="list-group-item">Recommended artist 1</a>
				<a href="#" class="list-group-item">Recommended artist 2</a>
				<a href="#" class="list-group-item">Recommended artist 3</a>
				<a href="#" class="list-group-item">Recommended artist 4</a>
				</div>

				<div class="recommended-concerts">
				<a href="#" class="list-group-item active text_label1">
				   Recommended Upcoming concerts
				</a>
				<a href="#" class="list-group-item">Recommended concerts 1</a>
				<a href="#" class="list-group-item">Recommended concerts 2</a>
				<a href="#" class="list-group-item">Recommended concerts 3</a>
				<a href="#" class="list-group-item">Recommended concerts 4</a>
				</div>
				
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
        						<li class="active"><a href="#tab1">Post Artist Info</a></li>
       							<li><a href="#tab2">Post Concerts Info</a></li>
        						<li><a href="#tab3" id="tab3">Add Concert</a></li>
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
												<td><button type="button" class="btn btn-block btn-grey" id="searchartist">Search</button></td>
												<td><input type="text" class="form-control" id="artistname"  placeholder="artist name" ></td>
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
											<tr>
												<td>Post Information :</td><td><input type="text" class="form-control" id="artist_post_info"  placeholder="Artist Information" ></td>
											</tr>
										</tbody>
									</table>
								</div>
						 	<div id="tab2" class="tab">
							<table class="table table-bordered post_concert">
										<thead>
											<tr><th colspan="2">Concert Information</th><tr>
											<tr><th colspan="2"><span id="errortext2"></span></th></tr>
										</thead>
										<tbody>
											<tr>
												<td><button type="button" class="btn btn-block btn-grey" id="searchconcert">Search</button></td>
												<td><input type="text" class="form-control" id="concertname"  placeholder="Concert name" ></td>
											</tr>
											<tr>
												<td>Concert :</td><td><span id="post_concert_name">Concert name</span></td>
											</tr>
											<tr>
												<td>Artist :</td><td><span id="post_concert_artist">Artist name</span></td>
											</tr>
											<tr>
												<td>Date :</td><td><span id="post_concert_date">11-12-2014</span></td>
											</tr>
											<tr>
												<td>Time :</td><td><span id="post_concert_time">5:45pm</span></td>
											</tr>
											<tr>
												<td>Ticket Price :</td><td><span id="post_concert_ticket">50</span></td>
											</tr>
											<tr>
												<td>Availability :</td><td><span id="post_concert_availability">40</span></td>
											</tr>
											<tr>
												<td>Venue :</td><td><span id="post_concert_venue">New York</span></td>
											</tr>
											<tr>
												<td>Tickets Link :</td><td><span id="post_concert_link">Tickets Link</span></td>
											</tr>
											<tr>
												<td>Post Information :</td><td><input type="text" class="form-control" id="concert_post_info"  placeholder="Concert Information" ></td>
											</tr>
										</tbody>
									</table>
							 </div>
							 <div id="tab3" class="tab">
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
												<td>Artist :</td><td><input type="text" class="form-control" id="add_artist_name"  placeholder="Artist name" ></td>
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
												<td>Venue :</td><td><select id="add_concert_venue"></select></td>
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
					   <li class="list-group-item border_list">
						<table class="table-bordered tablefont">
							<tr><th colspan="2" class="text_label1">Artist Information posted by Username</th></tr>
							<tr><td>Artist:</td><td>The Artist</td></tr>
							<tr><td>Website:</td><td>www.website.com</td></tr>
							<tr><td>Genre:</td><td>Genre</td></tr>
							<tr><td>Bio:</td><td>This is bio</td></tr>
							<tr><td>Email:</td><td>amcool4u@gmail.com</td></tr>
							<tr><td>Information:</td><td>This is information part</td></tr>
						</table>
					   </li>
					   <li class="list-group-item border_list">
						<table class="table-bordered tablefont">
							<tr><th colspan="2" class="text_label1">Concert Information posted by Username</th></tr>
							<tr><td>Concert:</td><td>The Artist</td></tr>
							<tr><td>Date:</td><td>www.website.com</td></tr>
							<tr><td>Time:</td><td>This is bio</td></tr>
							<tr><td>Price:</td><td>amcool4u@gmail.com</td></tr>
							<tr><td>Availability:</td><td>This is information part</td></tr>
							<tr><td>Venue:</td><td>This is information part</td></tr>
							<tr><td>Ticket Link:</td><td>This is information part</td></tr>
							<tr><td>Information:</td><td>This is information part</td></tr>
						</table>
					   </li>
					</ul>
				</div>
				<div class="clearfix"></div>
	</div>

	<div class="public-post">
				<div class="user-concert-posts">
					<a href="#" class="list-group-item active text_label1">
					   Concert related posts -Users
					</a>
					<a href="#" class="list-group-item">
						<table class="table-bordered tablefont">
							<tr><th colspan="2" class="text_label1"> Posted by Username</th></tr>
							<tr><td>Concert:</td><td>The Artist</td></tr>
							<tr><td>Date:</td><td>www.website.com</td></tr>
							<tr><td>Time:</td><td>This is bio</td></tr>
							<tr><td>Price:</td><td>amcool4u@gmail.com</td></tr>
							<tr><td>Availability:</td><td>This is information part</td></tr>
							<tr><td>Venue:</td><td>This is information part</td></tr>
							<tr><td>Ticket Link:</td><td>This is information part</td></tr>
							<tr><td>Information:</td><td>This is information part</td></tr>
						</table>
					</a>
				</div>
				<div class="artist-concert-posts">
					<a href="#" class="list-group-item active text_label1">
					   Concert related posts - Artists
					</a>
					<a href="#" class="list-group-item">
						<table class="table-bordered tablefont">
							<tr><th colspan="2" class="text_label1"> Posted by Username</th></tr>
							<tr><td>Concert:</td><td>The Artist</td></tr>
							<tr><td>Date:</td><td>www.website.com</td></tr>
							<tr><td>Time:</td><td>This is bio</td></tr>
							<tr><td>Price:</td><td>amcool4u@gmail.com</td></tr>
							<tr><td>Availability:</td><td>This is information part</td></tr>
							<tr><td>Venue:</td><td>This is information part</td></tr>
							<tr><td>Ticket Link:</td><td>This is information part</td></tr>
							<tr><td>Information:</td><td>This is information part</td></tr>
						</table>
					</a>
				</div>
				
				<div class="public-artist-posts">
					<a href="#" class="list-group-item active text_label1">
					   Artist related posts
					</a>
					<a href="#" class="list-group-item">
						<table class="table-bordered tablefont">
							<tr><th colspan="2" class="text_label1">Posted by Username</th></tr>
							<tr><td>Artist:</td><td>The Artist</td></tr>
							<tr><td>Website:</td><td>www.website.com</td></tr>
							<tr><td>Bio:</td><td>This is bio</td></tr>
							<tr><td>Email:</td><td>amcool4u@gmail.com</td></tr>
							<tr><td>Information:</td><td>This is information part</td></tr>
						</table>
					</a>
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
<script type="text/javascript" src="./js/user_profile.js"></script>	
</html>