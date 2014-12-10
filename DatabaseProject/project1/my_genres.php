<?php
session_name("project");
session_start();
include('header.php');
?>

 <html>
	<head>
	  <script type="text/javascript" src="./js/mygenre.js"></script>	
	</head>
        <body>
         <div class="datawrapper" align="center">
		<div class="allshadow smalltable" > 
		<table id="genre_table" class="table table-bordered ">
			    <thead>
			       <tr>
				  <th colspan="8" class="text_label1"><h3> Genres</h3></th>
			       </tr>
			       <tr><th colspan="8"><span id="errortext2"></span></th></tr>
			    </thead>
			    <tbody>
			      
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
				
			       </tr>
			    </tbody>
			</table>
		</div>
		<div class="allshadow smalltable" > 
			<table id="sub_genre_table" class="table table-bordered ">
				    <thead>
				       <tr>
					  <th colspan="8" class="text_label1"><h3> Sub Genres</h3></th>
				       </tr>
				       <tr><th colspan="8"><span id="errortext3"></span></th></tr>
				    </thead>
				    <tbody>
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
					   
					</tr>
				    </tbody>
			</table>
		    </div>
	    </div>
        </body>
        
</html>