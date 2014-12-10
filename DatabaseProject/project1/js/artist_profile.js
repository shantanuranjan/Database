function profile_fetch(){
    var artist_id = sessionStorage.getItem("artist_id");
          $.ajax({
			url : "./datafetch/rating_review.php",
			type : "post",
			async :false,
			data : {'artist_id':artist_id},
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

function artist_past_concert(){
    $("#artist-concert").empty();
    var artist_id = sessionStorage.getItem("artist_id");
        $.ajax({
			url : "./datafetch/artist_past_concert.php",
			type : "post",
			async :false,
			data : {'artist_id':artist_id},
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
			   // alert("Cannot Update post");
			   }
			}
		});  
    
}

function display_concert_post(){
    $("#post_list").empty();
    var artist_id = sessionStorage.getItem("artist_id");
        $.ajax({
			url : "./datafetch/display_concert_info.php",
			type : "post",
			async :false,
			data : {'artist_id':artist_id},
			dataType : "json",
			success : function(data){
			   if (data[0] != null ) {
				for(var i=0;i<data.length;i++){
					 var element = $("<li class='list-group-item border_list'></li>");
					    var element2 = $("<table class='table-bordered tablefont'></table>");
					    element2.append("<tr><th colspan='2' class='text_label1'>Artist Information posted by "+data[i].username+"</th></tr>");
					    element2.append("<tr><td>Artist:</td><td>"+data[i].artist_name+"</td></tr>");
					    element2.append("<tr><td>Concert Name:</td><td>"+data[i].concert_name+"</td></tr>");
					    element2.append("<tr><td>Date:</td><td>"+data[i].date+"</td></tr>");
					    element2.append("<tr><td>Time:</td><td>"+data[i].time+"</td></tr>");
					    element2.append("<tr><td>Ticket Link:</td><td>"+data[i].link+"</td></tr>");
					    element2.append("<tr><td>Venue:</td><td>"+data[i].venue+"</td></tr>");
					    element2.append("<tr><td>Information:</td><td>"+data[i].description+"</td></tr>");
					    element2.appendTo(element);
					    element.appendTo("#post_list");
				}
			   }else{
			   // alert("Cannot Update post");
			   }
			}
		});  
    
}
function display_post(){
    $("#post_list").empty();
    var artist_id = sessionStorage.getItem("artist_id");
        $.ajax({
			url : "./datafetch/display_concert_info.php",
			type : "post",
			async :false,
			data : {'artist_id':artist_id},
			dataType : "json",
			success : function(data){
			   if (data[0] != null ) {
				   
				for(var i=0;i<data.length;i++){
				    var element = $("<li class='list-group-item border_list'></li>");
				    var element2 = $("<table class='table-bordered tablefont'></table>");
				    element2.append("<tr><th colspan='2' class='text_label1'>Artist Information posted by "+data[i].username+"</th></tr>");
				    element2.append("<tr><td>Artist:</td><td>"+data[i].artist_name+"</td></tr>");
				    element2.append("<tr><td>Concert Name:</td><td>"+data[i].concert_name+"</td></tr>");
				    element2.append("<tr><td>Date:</td><td>"+data[i].date+"</td></tr>");
				    element2.append("<tr><td>Time:</td><td>"+data[i].time+"</td></tr>");
				    element2.append("<tr><td>Ticket Link:</td><td>"+data[i].link+"</td></tr>");
				    element2.append("<tr><td>Venue:</td><td>"+data[i].venue+"</td></tr>");
				    element2.append("<tr><td>Information:</td><td>"+data[i].description+"</td></tr>");
				    element2.appendTo(element);
				    element.appendTo("#post_list");
				}
			   }else{
			   //alert("Cannot Update post");
			   }
			}
		});  
    
}
    
    function fetch_artist_details(){
    	var artist_id = sessionStorage.getItem("artist_id");
        
                   $.ajax({
    			url : "./datafetch/artist_profile_display.php",
    			type : "post",
    			async :false,
    			data : {'keyword':artist_id},
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

         

    function add_concerts() {
        var artist_id = sessionStorage.getItem("artist_id");
        var username = $("#post_artist_username").text();
        var name = $("#add_concert_name").val();
        var date = $("#add_concert_date").val();
        var time = $("#add_concert_time").val();
        var price = $("#add_concert_price").val();
        var availability = $("#add_concert_availability").val();
        var ticket_link = $("#add_concert_link").val();
        var venue_name = $("#add_concert_venue_name").val();
        var info = $("#artist_post_info").val();
        
         $.ajax({
    			url : "./datafetch/add_concert.php",
    			type : "post",
    			async :false,
    			data : {'artist_id':artist_id,'username':username,'name':name,'date':date,'time':time,'price':price,'availability':availability,
    				'ticket_link':ticket_link,'venue_name':venue_name,
    				'info':info},
    			dataType : "json",
    			success : function(data){
    			    if (data == 1) {
    				display_concert_post();
    			    }else{
    				$("#errortext1").html("Cannot post");
    			    }
    			}
    		});   
    }   
    
    function fetch_venue(){
  	  $.ajax({
  			url : "./datafetch/fetch_venue.php",
  			type : "post",
  			async :false,
  			dataType : "json",
  			success : function(data){
                    if(data !=null){
                  	  $("#add_concert_venue_name").empty();
                  	  for(var i=0;i<data.length;i++){
                  		  $("#add_concert_venue_name").append("<option name="+data[i].venue_id+">"+data[i].venue_name+"</option>");
                  	  }
                    }
  			    
  			}
  		});   
  	
  }
    $(document).ready(function(){
        $(function(){
         profile_fetch();
         artist_past_concert();
          //
        	var select = $(".tabs .tab-links").find(".active").children("a").attr("href");
        	if (select == "#tab1") {
        		fetch_artist_details();
        		display_post();
        	}
        });
        
        $("#post").on('click',function(){
        	var select = $(".tabs .tab-links").find(".active").children("a").attr("href");
        	 if(select =="#tab2") {
        		 add_concerts();
        	}
            });
        
        
        $(".tabs .tab-links").on('click',function(){
    	var select = $(".tabs .tab-links").find(".active").children("a").attr("href");
    	if (select == "#tab2") {
    		fetch_venue();
    		display_post();
    	}
    	
        });
        
      
        
        
        
    });