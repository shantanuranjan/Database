function fetch_user_genres(){
	 var user_id = sessionStorage.getItem('user_id');
    $.ajax({
			url : "./datafetch/fetch_user_genre.php",
			type : "post",
			async :false,
			data : {'user_id':user_id},
			dataType : "json",
			success : function(data){
				$("#genre_list tr").empty();
				if(data!=null){
				for(each_genre in data){
					  $("#genre_list tr").append("<td>&nbsp "+each_genre+" &nbsp</td>");
				}
			}
		}
		});
}

function fetch_user_subgenres(){
	var user_id = sessionStorage.getItem('user_id');
    $.ajax({
			url : "./datafetch/fetch_user_sub_genre.php",
			type : "post",
			async :false,
			data : {'user_id':user_id},
			dataType : "json",
			success : function(data){
				$("#sub_genre_list tr").empty();
				if(data!=null){
				for(each_genre in data){
					  $("#sub_genre_list tr").append("<td>&nbsp "+each_genre+" &nbsp</td>");
				}
			}
		}
		});
}


$(document).ready(function(){
	$(function(){
		fetch_user_genres();
		fetch_user_subgenres();
	});
        
});