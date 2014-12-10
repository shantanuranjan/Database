function profile_set_up(){
        var user_id =  sessionStorage.getItem('user_id');
        var username = $("#username").val();
	var name = $("#name").val();
	var dob = $("#dob").val();
	var email = $("#email").val();
	var city = $("#city").val();
     
     $.ajax({
			url : "./datafetch/profile_set_up.php",
			type : "post",
			async :false,
			data : {'user_id':user_id,'username':username,'name':name,'dob':dob,'email':email,'city':city},
			dataType : "json",
			success : function(data){
                              if (data == 1) {
                                   $("#errortext1").html("Your profile has been updated successfully!");
                              }else{
                                   $("#errortext1").html("Update issues , please try later");
                              }
			}
		});
}

function profile_fetch(){
var user_id = sessionStorage.getItem("user_id");
$.ajax({
			url : "./datafetch/profile_fetch.php",
			type : "post",
			async :false,
			data : {'user_id':user_id},
			dataType : "json",
			success : function(data){
				var profile = data[0];
				if(profile[0] != ""){
					set_up_profile(profile);
				}
				
				var genre = data[1];
				
				if(genre[0] != ""){
					set_up_genre(genre);
				}			
				
				var sub_genre = data[2];
				if(sub_genre[0] != ""){
					set_up_subgenre(sub_genre);
				}
			}
		});
}


function set_up_profile(profile){
	$("#username").val(profile.username);
	$("#name").val(profile.name);
	$("#dob").val(profile.dob);
	$("#email").val(profile.email);
	$("#city").val(profile.city);
}

function set_up_genre(genre){
     $("#genre_list tr").empty();
	for(each_genre in genre){
	 $("#genre_table input[type='checkbox']").each( function(){
		if($(this).val() == each_genre){
			$(this).prop('checked',true);
                        $("#genre_list tr").append("<td>&nbsp "+each_genre+" &nbsp</td>");
                        sub_genre_setup(each_genre);
		}
	 });
	}
}

function set_up_subgenre(subgenre){
$("#sub_genre_list tr").empty();
for(each_genre in subgenre){

        $("#sub_genre_table input[type='checkbox']").each(function(){

               if($(this).val() == each_genre){
                    $(this).prop('checked',true);

                    $("#sub_genre_list tr").append("<td>&nbsp "+each_genre+" &nbsp</td>");
               }     
          });
     }
}
function sub_genre_setup(genre){
     var sub = [];
	$.ajax({
			url : "./datafetch/fetchSubGenres.php",
			type : "post",
			async :false,
			data : {'genre':genre},
			dataType : "json",
			success : function(data){
                         if (genre=="hip hop") {
                              $("#sub_hiphop tbody").empty();
                              for(var i=0;i<data.length;i++){
                                   $("#sub_hiphop tbody").append("<tr><td><input type='checkbox' value='"+data[i].sub_genre+"'> &nbsp &nbsp "+data[i].sub_genre+"</td></tr>");
                              }
                         }else{
                              $("#sub_"+genre+" tbody").empty();
                              for(var i=0;i<data.length;i++){
                                   $("#sub_"+genre+" > tbody").append("<tr><td><input type='checkbox' value='"+data[i].sub_genre+"'> &nbsp &nbsp "+data[i].sub_genre+"</td></tr>");
                              }
                         }
		    }
		});
}
function update_genre(genre){
     var user_id = sessionStorage.getItem("user_id");

     $.ajax({
			url : "./datafetch/updateGenres.php",
			type : "post",
			async :false,
			data : {'user_id':user_id,'genre':genre},
			dataType : "json",
			success : function(data){
                              if (data==1) {
                                   $("#errortext2").html("Successfully updated Genres");
                              }else{
                                   $("#errortext2").html("Genres unable to update");
                              }
                        }
		});
}

function update_sub_genre(sub_genre){
     var user_id = sessionStorage.getItem("user_id");

     $.ajax({
			url : "./datafetch/updateSubGenre.php",
			type : "post",
			async :false,
			data : {'user_id':user_id,'sub_genre':sub_genre},
			dataType : "json",
			success : function(data){
                              if (data==1) {
                                   $("#errortext3").html("Successfully updated Sub genres");
                              }else{
                                   $("#errortext3").html("Sub genres unable to update");
                              }
                        }
		});
}

function set_up_artist(artist) {
     var user_id = sessionStorage.getItem("user_id");
     $("#artist_list tbody").empty();
     for(var i=0;i<artist.length;i++){
           var element = $("<tr></tr>");
           element.append("<td>"+artist[i].name+"</td>");
           element.append("<td>"+artist[i].genre+"</td>");
           
            $.ajax({
			url : "./datafetch/checkFan.php",
			type : "post",
			async :false,
			data : {'user_id':user_id,'artist_id':artist[i].artist_id},
			dataType : "json",
			success : function(data){
                              if (data==1) {
                                   element.append("<td><label>Following</label></td>");
                              }else{
                                   element.append("<td><button type='button' class='btn btn-block btn-grey' id='"+artist[i].artist_id+"'>Follow</button></td>");
                              }
                        }
		});
             element.appendTo("#artist_list tbody");
           
     }
}

$(document).ready(function(){

//$(".datepicker").datepicker();
////	$(".datepicker").datepicker({
////             format: 'mm/dd/yyyy',
////             startDate: '-3d'
////            });
	$(function(){
               var originalState = $(".datawrapper").clone();
		if(sessionStorage.getItem("user_id")){
                    $("#genre_table input[type='checkbox']").each(function(){
                         $(this).prop('checked',false);
                    });
			profile_fetch();
		}
	});
        
          $("#update").on('click',function(){
		profile_set_up();
	});
          
          $("#update_genre").on('click',function(){
               var genre = [];
               var i=0;
               $("#genre_table input[type='checkbox']").each(function(){
                      if($(this).is(":checked")){
                       genre[i] = $(this).val();
                       i++;
                      }
                 });
                    update_genre(genre);
               });
          
          $("#update_sub_genre").on('click',function(){
               var sub_genre = [];
               var i=0;
               $("#sub_genre_table input[type='checkbox']").each(function(){
                      if($(this).is(":checked")){
                       sub_genre[i] = $(this).val();
                       i++;
                      }
                 });
               update_sub_genre(sub_genre);
               });
          
          
          
          $("#genre_table input[type='checkbox']").on('change',function(){
               var user_id = sessionStorage.getItem('user_id');
             if($(this).is(":checked")){
                 sub_genre_setup($(this).val());
             }else{
               if ($(this).val() == "hip hop"){
                    var sub =[];
                    var i =0;
                    $("#sub_hiphop input[type='checkbox']").each(function(){
                         if($(this).is(":checked")){
                              sub[i] = $(this).val();
                              i++;
                         }     
                    });
                    if (sub != null) {
                       $.ajax({
			url : "./datafetch/removeSubGenre.php",
			type : "post",
			async :false,
			data : {'user_id':user_id,'sub_genre':sub},
			dataType : "json",
			success : function(data){
                              
                        }
                    });
                    }
                    $("#sub_hiphop tbody").empty();
               }else{
                    var sub =[];
                    var i =0;
                    $("#sub_"+$(this).val()+" input[type='checkbox']").each(function(){
                         if($(this).is(":checked")){
                              sub[i] = $(this).val();
                              i++;
                         }     
                    });
                    if (sub != null) {
                       $.ajax({
			url : "./datafetch/removeSubGenre.php",
			type : "post",
			async :false,
			data : {'user_id':user_id,'sub_genre':sub},
			dataType : "json",
			success : function(data){
                              
                        }
                    });
                    }
                    $("#sub_"+$(this).val()+" tbody").empty();
               }
             }
          });
          
          $("#search").on('click',function(){
               var keyword = $("#keyword").val();
               $.ajax({
			url : "./datafetch/fetchArtist.php",
			type : "post",
			async :false,
			data : {'keyword':keyword},
			dataType : "json",
			success : function(data){
                              set_up_artist(data);
			}
		});   
          });
          
          $(document).on("click","#artist_list button",function(){
               var artist_id = $(this).attr('id');
               var parent = $(this).parent();
               var user_id = sessionStorage.getItem("user_id");
                $.ajax({
			url : "./datafetch/fanArtist.php",
			type : "post",
			async :false,
			data : {'user_id':user_id,'artist_id':artist_id},
			dataType : "json",
			success : function(data){
                              if (data==1) {
                                parent.empty();
                                parent.append("<label>Following</label>");
                              }else{
                                   
                              }
			}
		});   
          });
});