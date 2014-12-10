<?php
session_name("project");
session_start();
include('artist_header.php');
?>
    <html>
	<head>
	     <meta name="viewport" content="width=device-width, initial-scale=1.0">
	     <script type="text/javascript" src="./js/artist_update_profile.js"></script>
	</head>
        <body>
            <div class="pagewrapper">
            <div class="container">
            <div class="datawrapper" align="center">
               <div class="allshadow change_table smalltable" > 
				<table class="table table-bordered ">
				    <thead>
				       <tr>
					  <th colspan="2" class="text_label1"><h3>Personal Information</h3></th>
				       </tr>
				       <tr><th colspan="2"><span id="errortext1"></span></th></tr>
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
					  <td>website : </td>
					  <td>
					     <div class="col-sm-12">
						    <input type="text" class="form-control datepicker" id="website">
					      </div>
					  </td>
				       </tr>
					<tr>
					  <td>Bio: </td>
					  <td>
					      <div class="col-sm-12">
						    <input type="text" class="form-control" id="bio">
					      </div>
					  </td>
				       </tr>
				       <tr>
					  <td>Genre: </td>
					  <td>
					      <div class="col-sm-12">
						    <input type="text" class="form-control" id="genre">
					      </div>
					  </td>
				       </tr>
				       <tr>
					  <td>email: </td>
					  <td>
					      <div class="col-sm-12">
						    <input type="text" class="form-control" id="email">
					      </div>
					  </td>
				       </tr>
					<tr>
					    <th colspan="2">
						<button type="button" class="btn btn-primary btn-grey" id="update" style="width: 100%">
						    Update
						</button>
					    </th>
					</tr>
				    </tbody>
				</table>
		    </div>
            </div>
            </div>
            </div>