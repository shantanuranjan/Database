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

	for(each_genre in genre){
	 $(".newcentered2 input[type='checkbox']").each( function(){
		if($(this).val() == each_genre){
			$(this).prop('checked',true);
                        sub_genre_setup(each_genre);
		}
	 });
	}
}

function set_up_subgenre(subgenre){

for(each_genre in subgenre){
	 $(".newcentered3 input[type='checkbox']").each( function(){
		if($(this).val() == each_genre){
			$(this).prop('checked',true);
		}
	 });
	}
}

function profile_set_up(){
alert("profile set up called");
}

function sub_genre_setup(genre){
	$.ajax({
			url : "./datafetch/fetchSubGenres.php",
			type : "post",
			async :false,
			data : {'genre':genre},
			dataType : "json",
			success : function(data){
			$("#sub_"+genre+" tbody").empty();
				for(each_sub in data){
				 $("#sub_"+genre+" tbody").append("<tr><td><label><input type='checkbox' value='"+each_sub+"'> &nbsp &nbsp "+each_sub+"</label></td></tr>")
				}
			}
		});

}

$(document).ready(function(){
	
	$(".datepicker").datepicker();
	
	$(function(){
		//if(sessionStorage.getItem("user_id")){
			profile_fetch();
		//}
	});

	$("#update").on('click',function(){
		profile_set_up();
	});
	
	$(".newcentered2 input[type='checkbox']").change(function(){
		var selected =[];
		var count =0;
		$(".newcentered2 input:checked").each(function(){
			selected.push($(this).val());
			sub_genre_setup(selected);
		});
		
		$(".newcentered2 input:checked").each(function(){
			count++;
		});
		
		if(count == 0){
			$("#sub_genre_table > tbody > tr").remove();
		}
	});


});