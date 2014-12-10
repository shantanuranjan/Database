function concert_list_fetch(){
    var search_type = sessionStorage.getItem("search_type");
    var search_text = sessionStorage.getItem("search_text");
    
    if (sessionStorage.getItem("search_type")) {
            sessionStorage.removeItem("search_type");
            sessionStorage.removeItem("search_text");
            
            $.ajax({
			url : "./datafetch/fetchConcertBytype.php",
			type : "post",
			async :false,
			data : {'search_text':search_text,'search_type':search_type},
			dataType : "json",
			success : function(data){
                            if (data[0]!=null) {
                                set_up_concert(data);
                            }else{
                                $("#post_list").empty();
                                $("#post_list").append("<li class='list-group-item border_list'>No Records found</li>");
                            }
			}
	    }); 

    }else{
        sessionStorage.removeItem("search_text");
               $.ajax({
			url : "./datafetch/fetchConcert.php",
			type : "post",
			async :false,
			data : {'search_text':search_text},
			dataType : "json",
			success : function(data){
                            if (data[0]!=null) {
                                set_up_concert(data);
                            }else{
                              $("#post_list").empty();
                              $("#post_list").append("<li class='list-group-item border_list'>No Records found</li>");
                            }
			}
		});
    }
}

function set_up_concert(data){
  $("#post_list").empty();

			   if (data[0] != null ) {
				for(var i=0;i<data.length;i++){
				    var element = $("<li class='list-group-item border_list'></li>");
				    var element2 = $("<table class='table-bordered tablefont' id="+data[i].concert_id+"></table>");
				    element2.append("<tr><th colspan='2' class='text_label1'>Concert Information</th></tr>");
				    element2.append("<tr><td>Concert:</td><td>"+data[i].concert_name+"</td></tr>");
				    element2.append("<tr><td>Genre :</td><td>"+data[i].genre_name+"</td></tr>");
                                    element2.append("<tr><td>Artist :</td><td>"+data[i].name+"</td></tr>");
                                    element2.append("<tr><td>date :</td><td>"+data[i].date+"</td></tr>");
                                    element2.append("<tr><td>Time :</td><td>"+data[i].time+"</td></tr>");
                                    element2.append("<tr><td>Location :</td><td>"+data[i].location+"</td></tr>");
				    element2.appendTo(element);
				    element.appendTo("#post_list");
				}
			   }else{
			    
			   }
    
}


$(document).ready(function(){
    $(function(){
      concert_list_fetch();
    });
    
    $(document).on('click','#post_list .border_list',function(){
       var concert_id = $(this).children(".tablefont").attr("id") ;
       sessionStorage.setItem("searched_concert_id",concert_id);
       window.location.href = "./concert_visit.php"
    });
    
});