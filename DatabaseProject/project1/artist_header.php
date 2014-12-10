<?php 

?>
<html>
<head>
		 <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <link rel="stylesheet" type="text/css" href="./css/bootstrap.css" />
         <link rel="stylesheet" type="text/css" href="./css/project.css" />
         <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
		 <script src="./js/bootstrap.min.js"></script>
</head>
<body>
<div class="header">
<nav class="navbar navbar-default" role="navigation">
   <div class="navbar-header">
      <a class="navbar-brand" href="#">Music Mania</a>
   </div>
   <div>
      <!--Left Align-->
      <div class="navbar-form navbar-left" style="width : 40%">
		 <div class="form-group" style="width : 70%">
            <input type="text" style="width : 100%" id="search_text" class="form-control" placeholder="Search">
         </div>
		 <div class="btn-group">
		   <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
			  Search <span class="caret"></span>
		   </button>
		   <ul class="dropdown-menu" role="menu">
			  <li><a href="#" id="searh_user">Search User</a></li>
			  <li><a href="#" id="search_artist">Search Artist/Band</a></li>
			  <li class="divider" ></li>
			  <li><a href="#" id="search_concert">Search Concerts</a></li>
			  <li class="divider"></li>
			  <li><a href="#" id="search_concert_genre">Search Concerts by genre</a></li>
			  <li><a href="#" id="search_artist_genre">Search Artists by genre</a></li>
			  <li class="divider"></li>
			  <li><a href="#" id="search_concert_loction">Search Concerts by Location</a></li>
			  <li><a href="#" id="search_concerts_date">Search Concerts by Date</a></li>
		   </ul>
		</div>
      </div> 
      <!--Right Align-->
      <ul class="nav navbar-nav navbar-right">
		 <li class="active"><a href="#" id="home">Home</a></li>
		 
		 <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
               User <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
               <li><a href="#" id="update_profile">Update Profile</a></li>
               <li class="divider"></li>
               <li><a href="#" id="log_out">Log out</a></li>
            </ul>
         </li>
      </ul>
   </div>
</nav>
</div>
<script src="./js/artist_header.js"></script>
</body>
</html>