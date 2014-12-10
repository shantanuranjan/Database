    <?php session_name("project");
    session_start();
    ?>
    <html>
	<head>
	     <meta name="viewport" content="width=device-width, initial-scale=1.0">
	     <link rel="stylesheet" type="text/css" href="./css/bootstrap.css" />
	     <link rel="stylesheet" type="text/css" href="./css/project.css" />
	     <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
	     <script type="text/javascript" src="./js/bootstrap.min.js"></script>
	     <script type="text/javascript" src="./js/bootstrap-datepicker.js"></script>
		     
	</head>
	<body>
		<div class="container">
		    <div class="newcentered1 shadow change_table">
			<table class="table table-bordered smalltable">
			    <thead>
			       <tr>
				  <th colspan="2" class="text_label"><h3>Personal Information</h3></th>
			       </tr>
			       <tr><th colspan="2"><span id="errortext"></span></th></tr>
			    </thead>
			    <tbody>
			       <tr>
				  <td>Username: </td>
				  <td>
				      <div class="col-sm-12">
					    <input type="text" class="form-control" id="username"  placeholder="username" >
				      </div>
				  </td>
			       </tr>
				<tr>
				  <td>Name: </td>
				  <td>
				      <div class="col-sm-12">
					    <input type="text" class="form-control" id="name"  placeholder="name" >
				      </div>
				  </td>
			       </tr>
				<tr>
				  <td>Date of birth : </td>
				  <td>
				      <div class="col-sm-12">
					    <input type="text" class="form-control datepicker" id="dob">
				      </div>
				  </td>
			       </tr>
				<tr>
				  <td>Email: </td>
				  <td>
				      <div class="col-sm-12">
					    <input type="text" class="form-control" id="email">
				      </div>
				  </td>
			       </tr>
				<tr>
				  <td>City: </td>
				  <td>
				      <div class="col-sm-12">
					    <input type="text" class="form-control" id="city">
				      </div>
				  </td>
			       </tr>
				<tr>
				    <th colspan="2">
					<button type="button" class="btn btn-primary" id="update" style="width: 100%">
					    Update
					</button>
				    </th>
				</tr>
			    </tbody>
			</table>
			    </div>
			    <div class="newcentered2 shadow">
			<table id="genre_table" class="table table-bordered smalltable">
			    <thead>
			       <tr>
				  <th colspan="2" class="text_label"><h3>Select Genres</h3></th>
			       </tr>
			       <tr><th colspan="2"><span id="errortext"></span></th></tr>
			    </thead>
			    <tbody>
			       <tr>
				  <td>Blues: </td>
				  <td>
									    <label>
									       <input type="checkbox" value="blues">
									    </label>
				  </td>
			       </tr>
							<tr>
				  <td>Country: </td>
				  <td>
									    <label>
									       <input type="checkbox" value="country">
									    </label>
				  </td>
			       </tr>
							<tr>
				  <td>Metal: </td>
				  <td>
									    <label>
									       <input type="checkbox" value="metal">
									    </label>
				  </td>
			       </tr>
							<tr>
				  <td>Rock: </td>
				  <td>
									    <label>
									       <input type="checkbox" value="rock">
									    </label>
				  </td>
			       </tr>
							<tr>
				  <td>Reggae: </td>
				  <td>
									    <label>
									       <input type="checkbox" value="reggae">
									    </label>
				  </td>
			       </tr>
							<tr>
				  <td>Techno: </td>
				  <td>
									    <label>
									       <input type="checkbox" value="techno">
									    </label>
				  </td>
			       </tr>
							<tr>
				  <td>Trance: </td>
				  <td>								  
									    <label>
									       <input type="checkbox" value="trance">
									    </label>
				  </td>
			       </tr>
							<tr>
				  <td>Hip Hop: </td>
				  <td>
									    <label>
									       <input type="checkbox" value="hip hop">
									    </label>
				  </td>
			       </tr>
			    </tbody>
			</table>
			    </div>
			    <div class="newcentered3 shadow">
			<table id="sub_genre_table" class="table table-bordered smalltable">
			    <thead>
			       <tr>
				  <th colspan="2" class="text_label"><h3>Select Sub Genres</h3></th>
			       </tr>
			       <tr><th colspan="2"><span id="errortext"></span></th></tr>
			    </thead>
			    <tbody>
			    </tbody>
			</table>
			    </div>
			    <div clas="clearfix"></div>
			    </div>
		    </body>
		    <script type="text/javascript" src="./js/create_user_profile.js"></script>
    </html>