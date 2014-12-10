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
				<div class="concert_post">
					<a href="#" class="list-group-item active text_label1" >
					   Concert Post
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
        						<li class="active"><a href="#tab1">User Info</a></li>
       							
						</ul>
							<div class="tab-content">
								<div id="tab1" class="tab active">
									<table class="table table-bordered post_artist">
										<thead>
											<tr><th colspan="2">User Information</th><tr>
											<tr><th colspan="2"><span id="errortext1"></span></th></tr>
										</thead>
										<tbody>
											
											<tr>
												<td>Username :</td><td><span id="post_username">username</span></td>
											</tr>
											<tr>
												<td>Name :</td><td><span id="post_user_name">name</span></td>
											</tr>
											<tr>
												<td>Date of Birth :</td><td><span id="post_user_dob">dob</span></td>
											</tr>
											<tr>
												<td>Email :</td><td><span id="post_user_email">email</span></td>
											</tr>
											<tr>
												<td>City  :</td><td><span id="post_user_city">city</span></td>
											</tr>
											
										</tbody>
									</table>
								</div>
						 	
					</div>					
						
				 </div>
				
				<div class="content">
				</div>
				<div class="clearfix"></div>
	</div>

	<div class="public-post">
				<div class="artist_post">
					<a href="#" class="list-group-item active text_label1">
					   Artist Post
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
<script type="text/javascript" src="./js/user_visitor_profile.js"></script>	

</html>