function concert_info_fetch(){
 var concert_id   = sessionStorage.getItem("searched_concert_id");
 
   $.ajax({
			url : "./datafetch/fetch_concert.php",
			type : "post",
			async :false,
			data : {'concert_id':concert_id},
			dataType : "json",
			success : function(data){
                            if (data!=null) {
                                set_up_concert(data);
                            }else{
                                $("#post_list").empty();
                                $("#post_list").append("<li class='list-group-item border_list'>No Records found</li>");
                            }
			}
	    }); 
    
    
}

function set_up_concert(data){
  $("#post_list").empty();
  var user_id = sessionStorage.getItem("user_id");
  var concert_id = sessionStorage.getItem("searched_concert_id");
    var date = new Date(data.date);
    var cur_date = new Date();
            var element = $("<li class='list-group-item border_list'></li>");
            var element2 = $("<table class='table-bordered tablefont' id="+data.concert_id+"></table>");
            element2.append("<tr><th colspan='2' class='text_label1'>Concert Information</th></tr>");
            element2.append("<tr><td>Concert:</td><td>"+data.concert_name+"</td></tr>");
            element2.append("<tr><td>Genre :</td><td>"+data.genre_name+"</td></tr>");
            element2.append("<tr><td>Artist :</td><td>"+data.name+"</td></tr>");
            element2.append("<tr><td>Date :</td><td>"+data.date+"</td></tr>");
            element2.append("<tr><td>Time :</td><td>"+data.time+"</td></tr>");
            element2.append("<tr><td>Venue :</td><td>"+data.venue_name+"</td></tr>");
            element2.append("<tr><td>Address :</td><td>"+data.address+"</td></tr>");
            element2.append("<tr><td>City :</td><td>"+data.city+"</td></tr>");
            element2.append("<tr><td>State :</td><td>"+data.state+"</td></tr>");
            if (date > cur_date) {
                    if (checkUserFollows() == 1) {
                        element2.append("<tr><td colspan='2'>You have RSVP'd for this event</td></tr>");
                    }else{
                        element2.append("<tr><td colspan='2'><button type='button' class='btn btn-block btn-grey' id='rsvp'>RSVP </button></td></tr>");    
                    }
                    
                    if (checkUserRecommendations() ==1) {
                        element2.append("<tr><td colspan='2'>This concert is already in the recommendation list</td></tr>");
                    }else{
                        element2.append("<tr><td colspan='2'><button type='button' class='btn btn-block btn-grey' id='add_rec'>Add to My Recommendations</button></td></tr>");
                    }
            }
            element2.appendTo(element);
            element.appendTo("#post_list");    
}

function checkUserFollows() {
      var user_id = sessionStorage.getItem("user_id");
      var concert_id = sessionStorage.getItem("searched_concert_id");
      var check ;
     $.ajax({
			url : "./datafetch/check_concert_attendance.php",
			type : "post",
			async :false,
			data : {'user_id':user_id,'concert_id':concert_id},
			dataType : "json",
			success : function(data){
                            if(data == 1){
                                check =1;    
                            }else{
                                check =0;        
                            }           
			}
	    });
    return check;
}

function checkUserRecommendations() {
      var user_id = sessionStorage.getItem("user_id");
      var concert_id = sessionStorage.getItem("searched_concert_id");
      var check ;
     $.ajax({
			url : "./datafetch/check_recommended_concert.php",
			type : "post",
			async :false,
			data : {'user_id':user_id,'concert_id':concert_id},
			dataType : "json",
			success : function(data){
                            if(data == 1){
                                check =1;    
                            }else{
                                check =0;        
                            }           
			}
	    });
    return check;
}

$(document).ready(function(){
    $(function(){
      concert_info_fetch();
    });
    
    
    $(document).on('click','.btn',function(){
        var select = $(this).attr("id");
        var user_id = sessionStorage.getItem("user_id");
        var concert_id = sessionStorage.getItem("searched_concert_id");
        var parent = $(this).parent();
        if (select == 'rsvp') {
                        $.ajax({
                              url : "./datafetch/insert_concert_attendance.php",
                              type : "post",
                              async :false,
                              data : {'user_id':user_id,'concert_id':concert_id},
                              dataType : "json",
                              success : function(data){
                                  if(data == 1){
                                      parent.empty();
                                      parent.append("You have RSVP'd for the concert");
                                  }else{
                                            
                                  }           
                              }
                        });
        }else if(select=="add_rec"){
                        $.ajax({
                              url : "./datafetch/insert_recommended_concert.php",
                              type : "post",
                              async :false,
                              data : {'user_id':user_id,'concert_id':concert_id},
                              dataType : "json",
                              success : function(data){
                                  if(data == 1){
                                       parent.empty();
                                      parent.append("Concert is added to the recommended list");
                                  }else{
                                            
                                  }           
                              }
                        });
        }
        
    });
});