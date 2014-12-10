function artist_list_fetch(){
    var search_type = sessionStorage.getItem("search_type");
    var search_text = sessionStorage.getItem("search_text");
    
    if (sessionStorage.getItem("search_type")) {
        
        
        if (search_type =="artist_genre") {
            sessionStorage.removeItem("search_type");
            sessionStorage.removeItem("search_text");
            
            $.ajax({
			url : "./datafetch/fetchArtistbyType.php",
			type : "post",
			async :false,
			data : {'search_text':search_text,'search_type':search_type},
			dataType : "json",
			success : function(data){
                            if (data[0]!=null) {
                                set_up_artist(data);
                            }else{
                                $("#post_list").empty();
                                $("#post_list").append("<li class='list-group-item border_list'>No Records found</li>");
                            }
			}
	    }); 
            
        }
    }else{
        sessionStorage.removeItem("search_text");
               $.ajax({
			url : "./datafetch/fetchArtist.php",
			type : "post",
			async :false,
			data : {'keyword':search_text},
			dataType : "json",
			success : function(data){
                            if (data[0]!=null) {
                                set_up_artist(data);
                            }else{
                              $("#post_list").empty();
                              $("#post_list").append("<li class='list-group-item border_list'>No Records found</li>");
                            }
			}
		});
    }
}

function set_up_artist(data){
  $("#post_list").empty();

			   if (data[0] != null ) {
				for(var i=0;i<data.length;i++){
				    var element = $("<li class='list-group-item border_list'></li>");
				    var element2 = $("<table class='table-bordered tablefont' id="+data[i].artist_id+"></table>");
				    element2.append("<tr><th colspan='2' class='text_label1'>Artist Information</th></tr>");
				    element2.append("<tr><td>Artist:</td><td>"+data[i].name+"</td></tr>");
				    element2.append("<tr><td>Genre :</td><td>"+data[i].genre+"</td></tr>");
				    element2.appendTo(element);
				    element.appendTo("#post_list");
				}
			   }else{
			    
			   }
    
}  

$(document).ready(function(){
    $(function(){
      artist_list_fetch();
    });
    
    $(document).on('click','#post_list .border_list',function(){
       var artist_id = $(this).children(".tablefont").attr("id") ;
       sessionStorage.setItem("search_artist_id",artist_id);
       window.location.href="./artist_visitor_profile.php";
    });
    
});