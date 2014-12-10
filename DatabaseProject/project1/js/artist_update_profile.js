

function profile_fetch(){
var artist_id = sessionStorage.getItem("artist_id");
$.ajax({
			url : "./datafetch/artist_profile_fetch.php",
			type : "post",
			async :false,
			data : {'artist_id':artist_id},
			dataType : "json",
			success : function(data){
				if(data != null){
					$("#username").val(data.username);
					$("#name").val(data.name);
					$("#website").val(data.website);
					$("#bio").val(data.bio);
					$("#email").val(data.email);
					$("#genre").val(data.genre);
				}
			}
		});
}

function profile_set_up(){
var artist_id = sessionStorage.getItem("artist_id");
var username = $("#username").val();
var name = $("#name").val();
var website = $("#website").val();
var bio = $("#bio").val();
var email = $("#email").val();
var genre = $("#genre").val();
 
 $.ajax({
		url : "./datafetch/artist_profile_set_up.php",
		type : "post",
		async :false,
		data : {'artist_id':artist_id,'username':username,'name':name,'website':website,'bio':bio,'email':email,'genre':genre},
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

$(document).ready(function(){
	
	$(function(){
		profile_fetch();
	});
	
	$("#update").on('click',function(){
		profile_set_up();
	});
	
});