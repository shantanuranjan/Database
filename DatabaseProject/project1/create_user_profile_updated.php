<?php
 session_name("project");
session_start();
include('header.php');
?>
    <html>
	<head>
	     <meta name="viewport" content="width=device-width, initial-scale=1.0">
	     
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
					<button type="button" class="btn btn-primary btn-grey" id="update" style="width: 100%">
					    Update
					</button>
				    </th>
				</tr>
			    </tbody>
			</table>
		    </div>
            </div>
	    <div class="datawrapper" align="center">
		<div class="allshadow smalltable" > 
		<table id="genre_table" class="table table-bordered ">
			    <thead>
			       <tr>
				  <th colspan="8" class="text_label1"><h3>Select Genres</h3></th>
			       </tr>
			       <tr><th colspan="8"><span id="errortext2"></span></th></tr>
			    </thead>
			    <tbody>
			       <tr>
				  <td>
				    <label>
					<input type="checkbox" id="blues" value="blues"> &nbsp &nbsp Blues
				    </label>
				  </td>
				  <td>
				    <label>
					<input type="checkbox" id="country" value="country"> &nbsp &nbsp Country
				    </label>
				  </td>
				  <td>
				    <label>
					<input type="checkbox" id="metal" value="metal"> &nbsp &nbsp Metal
				    </label>
				  </td>
				  <td>
				    <label>
					<input type="checkbox" id="rock" value="rock"> &nbsp &nbsp Rock
				    </label>
				  </td>
				  <td>
				    <label>
					<input type="checkbox" id="reggae" value="reggae"> &nbsp &nbsp Reggae
				    </label>
				  </td>
				  <td>
				    <label>
					<input type="checkbox" id="techno" value="techno"> &nbsp &nbsp Techno
				    </label>
				  </td>
				  <td>
				    <label>
					<input type="checkbox" id="trance" value="trance"> &nbsp &nbsp Trance
				    </label>
				  </td>
				  <td>
				    <label>
					<input type="checkbox" id="hiphop" value="hip hop"> &nbsp &nbsp Hip Hop
				    </label>
				  </td>
			       </tr>
			       <tr>
				<td>Your Genre List :</td>
				<td colspan="6">
				    <table id="genre_list">
					<tbody>
					    <tr>
						<td>Genres List</td>
					    </tr>
					</tbody>
				    </table>
				</td>
				<td>
				    <button type="button" class="btn btn-primary btn-grey" id="update_genre">
					Update 
				    </button>
				</td>
			       </tr>
			    </tbody>
			</table>
		</div>
		<div class="allshadow smalltable" > 
			<table id="sub_genre_table" class="table table-bordered ">
				    <thead>
				       <tr>
					  <th colspan="8" class="text_label1"><h3>Select Sub Genres</h3></th>
				       </tr>
				       <tr><th colspan="8"><span id="errortext3"></span></th></tr>
				    </thead>
				    <tbody>
					<tr><th>Blues</th>
					<th>Country</th>
					<th>Metal</th>
					<th>Rock</th>
					<th>Reggae</th>
					<th>Techno</th>
					<th>Trance</th>
					<th>Hip Hop</th></tr>
					<tr>
					    <td colspan="1">
						<table class="table table-bordered" id="sub_blues"><tbody></tbody></table>
					    </td>
					
					    <td colspan="1">
						<table class="table table-bordered" id="sub_country"><tbody></tbody></table>
					    </td>
					
					    <td colspan="1">
						<table class="table table-bordered" id="sub_metal"><tbody></tbody></table>
					    </td>
					
					    <td colspan="1">
						<table class="table table-bordered" id="sub_rock"><tbody></tbody></table>
					    </td>
					
					    <td colspan="1">
						<table class="table table-bordered" id="sub_reggae"><tbody></tbody></table>
					    </td>
					
					    <td colspan="1">
						<table class="table table-bordered" id="sub_techno"><tbody></tbody></table>
					    </td>
					
					    <td colspan="1">
						<table class="table table-bordered" id="sub_trance"><tbody></tbody></table>
					    </td>
					
					    <td colspan="1">
						<table class="table table-bordered" id="sub_hiphop"><tbody></tbody></table>
					    </td>
					</tr>
					<tr>
					    <td>Your sub genre list :</td>
					    <td colspan="6">
						<table id="sub_genre_list">
						    <tbody>
						    <tr>
							<td>Sub genres List</td>
						    </tr>
						    </tbody>
						</table>
					    </td>
					    <td>
						<button type="button" class="btn btn-primary btn-grey" id="update_sub_genre">
						    Update
						</button>
					    </td>
					</tr>
				    </tbody>
			</table>
		    </div>
	    </div>
	    <div class="datawrapper" align="center">
		<div class="allshadow smalltable" > 
		<table class="table table-bordered">
                        <thead>
                           <tr>
                              <th colspan="3" class="text_label1">Select Artist</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td>Keyword</td>
                              <td><div class="col-sm-12">
                                        <input type="text" class="form-control" id="keyword"  placeholder="keyword" >
                                  </div>
                              </td>
			      <td>
				<button type="button" class="btn btn-block btn-grey" id="search">
                                     Search
                                </button>
			      </td>
                           </tr>
			   <tr>
			    <td>
				Your Favourite Artist : 
			    </td>
			    <td>
				<table>
				    <tr>
					<td>Artist List</td>
				    </tr>
				</table>
			    </td>
			    <td>
				<button type="button" class="btn btn-block btn-grey" id="update_artist">
                                     Update
                                </button>
			    </td>
			   </tr>
                        </tbody>
                    </table>
		</div>
		<div class="allshadow smalltable" > 
		<table class="table table-bordered" id="artist_list">
                        <thead>
                           <tr><th colspan="3" class="text_label1">Artists</th></tr>
			   <tr><th colspan="3"><span id="errortext"></span></th></tr>
			   <tr><th>Artist/Band</th><th>Genre</th><th>Follow</th></tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
		</div>
	    </div>
            <div class="clearfix"></div>
	    </div>
            </div>
	    <script type="text/javascript" src="./js/create_user_profile_updated.js"></script>
        </body>
    </html>
        