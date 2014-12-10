 function fetch_artist_details(){
        var keyword = sessionStorage.getItem("search_artist_id");
                   $.ajax({
    			url : "./datafetch/artist_profile_display.php",
    			type : "post",
    			async :false,
    			data : {'keyword':keyword},
    			dataType : "json",
    			success : function(data){
    				if (data !=null) {
                                	
                    $("#post_artist_username").html(data.username);
    				$("#post_artist_name").html(data.name);
    				$("#post_artist_website").html(data.website);
    				$("#post_artist_genre").html(data.genre);
    				$("#post_artist_desc").html(data.description);
    				$("#post_artist_email").html(data.email);
    				
    			    }else{
    				$("#errortext1").html("Cannot find Artist");
    			    }
    			    
    			}
    		});   
    } 
         

 function artist_past_concert(){
     $("#artist-concert").empty();
     var keyword = sessionStorage.getItem("search_artist_id");
         $.ajax({
 			url : "./datafetch/artist_past_concert.php",
 			type : "post",
 			async :false,
 			data : {'artist_id':keyword},
 			dataType : "json",
 			success : function(data){
 			   if (data[0] != null ) {
 				for(var i=0;i<data.length;i++){
 					
 					 var element = $("<li class='list-group-item border_list'></li>");
 					    var element2 = $("<table class='table-bordered tablefont'></table>");
 					    element2.append("<tr><th colspan='2' class='text_label1'>"+data[i].concert_name+"</th></tr>");
 					    element2.append("<tr><td>Venue:</td><td>"+data[i].venue_name+"</td></tr>");
 					   
 					    element2.append("<tr><td>City:</td><td>"+data[i].city+"</td></tr>");
 					    element2.appendTo(element);
 					    element.appendTo("#artist-concert");
 				}
 			   }else{

 			   }
 			}
 		});   
     
 }
 
 function check_follow(){
	 var artist_id = sessionStorage.getItem("search_artist_id");
     var user_id = sessionStorage.getItem("user_id");
      $.ajax({
	url : "./datafetch/checkFan.php",
	type : "post",
	async :false,
	data : {'user_id':user_id,'artist_id':artist_id},
	dataType : "json",
	success : function(data){
                    if (data==1) {
                    	$(".follow").empty();
        				$(".follow").append("<span style='font-size:30;background-color:#f8f8f8'>You are a Fan now!</span>");
        			    }else{
        				
        				$(".follow").empty();
        				$(".follow").append("<button type='button' class='btn btn-block btn-grey' id='follow'>Be a Fan</button>");
        			    } 
	}
});
	    
	}
 
 function profile_fetch(){
	 var keyword = sessionStorage.getItem("search_artist_id");
	          $.ajax({
				url : "./datafetch/rating_review.php",
				type : "post",
				async :false,
				data : {'artist_id':keyword},
				dataType : "json",
				success : function(data){
	  
				   
				    if (data[0] != null){
				    	for(var i=0;i<data.length;i++){
				    		var element = $("<a href='#' class='list-group-item'></a>");
				    		var element2 = $("<table class='table-bordered tablefont'></table>");
				    		element2.append("<tr><th colspan='2' class='text_label1'>Rated by "+data[i].name+"</th></tr>");
				    		element2.append("<tr><td>Concert :</td><td>"+data[i].concert_name+"</td></tr>");
				    		element2.append("<tr><td>Rating :</td><td>"+data[i].rating+"</td></tr>");
				    		element2.append("<tr><td>Review :</td><td>"+data[i].review+"</td></tr>");
				    		
				    		element2.appendTo(element);
				    		element.appendTo(".public-rate-posts");
				    	    }
				    }else{
					$(".public-rate-posts").empty();
					$(".public-rate-posts").append("<a href='#' class='list-group-item active text_label1'>No Ratings and Reviews</a>");
					
				    }
				}
		    });
	    
	}
 
 function follow_artist(){
	    var user_id = sessionStorage.getItem("user_id");
	    var artist_id = sessionStorage.getItem("search_artist_id");
	    
	    $.ajax({
				url : "./datafetch/follow_artist.php",
				type : "post",
				async :false,
				data : {'user_id':user_id,'artist_id':artist_id},
				dataType : "json",
				success : function(data){
					if (data==1) {
                    	$(".follow").empty();
        				$(".follow").append("<span style='font-size:30;background-color:#f8f8f8'>You are a Fan now!</span>");
        			    }else{
        				
        				$(".follow").empty();
        				$(".follow").append("<button type='button' class='btn btn-block btn-grey' id='follow'>Be a Fan</button>");
        			    } 
				}
		    });
	    
	}


$(document).ready(function(){
        $(function(){
        	artist_past_concert();
        	profile_fetch();
        	var select = $(".tabs .tab-links").find(".active").children("a").attr("href");
        	if (select == "#tab1") {
        		fetch_artist_details();
        		 check_follow();
        	}
        });  
        
        $(document).on('click','.follow .btn',function(){
    	    follow_artist();
    	});
    });