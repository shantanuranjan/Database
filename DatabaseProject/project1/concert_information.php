<?php
include('header.php');
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="./css/datepicker.css" />
	<link rel="stylesheet" type="text/css" href="./css/bootstrap-timepicker.css" />
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
 <table class="table table-bordered smalltable newcentered" id="concertinfo">
                        <thead>
                           <tr>
                              <th colspan="2" class="text_label"><h3>Concert Information</h3></th>
                           </tr>
                           <tr><th colspan="2" ><span id="errortext"></span></th></tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td>Concert Name: </td>
                              <td><div class="col-sm-12">
                                       
											<label>The western wind</label>
										
                                  </div>
                              </td>
                           </tr>
                           <tr>
                              <td>Time: </td>
                              <td><div class="col-sm-12">
                                       
										<label>9:00 PM</label>
										
                                  </div>
                              </td>
                           </tr>
                           <tr>
                           <td>Date: </td>
                              <td><div class="col-sm-12">
                                       
											<label>15-dec-2014</label>
										
                                  </div>
                              </td>
                           </tr>
                           <tr>
                        					<td>Ticket price:</td>
                        					 <td><div class="col-sm-12">
                                       <label>$40</label>
										
                                  </div>
                              </td>
                        				</tr>
                        				<tr>
                        					<td>Availability:</td>
                        					 <td><div class="col-sm-12">
                                       
											<label>540</label>
										
                                  </div>
                              </td>
                        				</tr>
                        				<tr>
                        					<td>Location:</td>
                        					 <td ><div class="col-sm-12">
                                       
											<label>New York</label>
										
                                  </div>
                              </td>
                        				</tr>
                            <tr>
                                <th colspan="2">
                                    <button type="button" class="btn btn-primary" id="login" style="width: 20%">
                                        RSVP
                                    </button>
                                </th>
                            </tr>
                           
                        </tbody>
                    </table>
</div>

</html>