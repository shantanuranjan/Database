function myArtist(){
	var user_id = sessionStorage.getItem('user_id');
    $("#myartist").empty();
        $.ajax({
			url : "./datafetch/fetch_myartist.php",
			type : "post",
			async :false,
			data : {'user_id':user_id},
			dataType : "json",
			success : function(data){
			   if (data[0] != null ) {
				for(var i=0;i<data.length;i++){
					
				    var element = $("<li class='list-group-item border_list'></li>");
				    var element2 = $("<table class='table-bordered tablefont'></table>");
				    element2.append("<tr><th colspan='2' class='text_label1'>Artist Information</th></tr>");
				    element2.append("<tr><td>Artist:</td><td>"+data[i].name+"</td></tr>");
				    element2.append("<tr><td>Website:</td><td>"+data[i].website+"</td></tr>");
				    element2.append("<tr><td>Genre:</td><td>"+data[i].genre_name+"</td></tr>");
				    element2.append("<tr><td>Bio:</td><td>"+data[i].description+"</td></tr>");
				    element2.append("<tr><td>Email:</td><td>"+data[i].email+"</td></tr>");
				    element2.appendTo(element);
				    element.appendTo("#myartist");
				}
			   }else{
			  
			   }
			}
		});  
    
}



$(document).ready(function(){


	$(function(){
		
		myArtist();
		
		})
	
});