function profile_fetch(){
    var user_id = sessionStorage.getItem("user_visitor_id");
          $.ajax({
			url : "./datafetch/user_visitor_profile_fetch.php",
			type : "post",
			async :false,
			data : {'user_id':user_id},
			dataType : "json",
			success : function(data){
  
				if (data !=null) {
                	
                    $("#post_username").html(data.username);
    				$("#post_user_name").html(data.name);
    				$("#post_user_dob").html(data.dob);
    				$("#post_user_city").html(data.city);    				
    				$("#post_user_email").html(data.email);
    				
    			    }else{
    				$("#errortext1").html("Cannot find Artist");
    			    }
    			    
    			
			}
	    });
    
} 
function public_rate_review(){
    var user_id = sessionStorage.getItem("user_visitor_id");
        $.ajax({
			url : "./datafetch/user_public_rate_review.php",
			type : "post",
			async :false,
			data : {'user_id':user_id},
			dataType : "json",
			success : function(data){
			   if (data[0] != null ) {
				for(var i=0;i<data.length;i++){
					
				    var element = $("<a href='#' class='list-group-item'></a>");
				    var element2 = $("<table class='table-bordered tablefont'></table>");
				    element2.append("<tr><th colspan='2' class='text_label1'>Rated by "+data[i].name+"</th></tr>");
				    element2.append("<tr><td>Concert:</td><td>"+data[i].concert_name+"</td></tr>");
				    element2.append("<tr><td>Rating:</td><td>"+data[i].rating+"</td></tr>");
				    element2.append("<tr><td>Review:</td><td>"+data[i].review+"</td></tr>");
				    element2.appendTo(element);
				    element.appendTo(".public-rate-posts_visitor");
				}
				}else{
					$(".public-rate-posts_visitor").empty();
					$(".public-rate-posts_visitor").append("<a href='#' class='list-group-item active text_label1'>No Ratings and Reviews</a>");
					
				    }
			}
		});  
    
}
function display_post(){
    $(".artist_post").empty();
    $(".artist_post").append("<a href='#' class='list-group-item active text_label1' >Artist Post</a>");
    var user_id = sessionStorage.getItem("user_visitor_id");
    $("#post_list").empty();
        $.ajax({
			url : "./datafetch/display_artist_post.php",
			type : "post",
			async :false,
			data : {'user_id':user_id},
			dataType : "json",
			success : function(data){
			   if (data[0] != null ) {
				for(var i=0;i<data.length;i++){
				    var element = $("<a href='#' class='list-group-item ' ></a>");
				    var element2 = $("<table class='table-bordered tablefont'></table>");
				    element2.append("<tr><th colspan='2' class='text_label1'>Artist Information posted by "+data[i].username+"</th></tr>");
				    element2.append("<tr><td>Artist:</td><td>"+data[i].artist_name+"</td></tr>");
				    element2.append("<tr><td>Website:</td><td>"+data[i].url+"</td></tr>");
				    element2.append("<tr><td>Genre:</td><td>"+data[i].genre_name+"</td></tr>");
				    element2.append("<tr><td>Bio:</td><td>"+data[i].bio+"</td></tr>");
				    element2.append("<tr><td>Email:</td><td>"+data[i].email+"</td></tr>");
				    element2.append("<tr><td>Information:</td><td>"+data[i].description+"</td></tr>");
				    element2.appendTo(element);
				    element.appendTo(".artist_post");
				}
			   }else{
			   }
			}
		});  
    
}
function display_concert_post(){
    $(".concert_post").empty();
    $(".concert_post").append("<a href='#' class='list-group-item active text_label1' >Concert Post</a>");
    var user_id = sessionStorage.getItem("user_visitor_id");
    $("#post_list").empty();
        $.ajax({
			url : "./datafetch/display_concert_post.php",
			type : "post",
			async :false,
			data : {'user_id':user_id},
			dataType : "json",
			success : function(data){
			   if (data[0] != null ) {
				for(var i=0;i<data.length;i++){
				    var element = $("<a href='#' class='list-group-item '></a>");
				    var element2 = $("<table class='table-bordered tablefont'></table>");
				    element2.append("<tr><th colspan='2' class='text_label1'>Concert Information posted by "+data[i].username+"</th></tr>");
				    element2.append("<tr><td>Concert:</td><td>"+data[i].concert_name+"</td></tr>");
				    element2.append("<tr><td>Artist:</td><td>"+data[i].artist_name+"</td></tr>");
				    element2.append("<tr><td>Date:</td><td>"+data[i].date+"</td></tr>");
				    element2.append("<tr><td>Time:</td><td>"+data[i].time+"</td></tr>");
				    element2.append("<tr><td>Price:</td><td>"+data[i].price+"</td></tr>");
				    element2.append("<tr><td>Availability:</td><td>"+data[i].availability+"</td></tr>");
				    element2.append("<tr><td>Venue:</td><td>"+data[i].venue+"</td></tr>");
				    element2.append("<tr><td>Ticket Link:</td><td>"+data[i].link+"</td></tr>");
				    element2.append("<tr><td>Information :</td><td>"+data[i].description+"</td></tr>");
				    element2.appendTo(element);
				    element.appendTo(".concert_post");
				}
			   }else{
			   }
			}
		});  
    
}

function check_follow(){
    var user_id = sessionStorage.getItem("user_id");
    var follow_id = sessionStorage.getItem("user_visitor_id");
    
    $.ajax({
			url : "./datafetch/check_user_follows.php",
			type : "post",
			async :false,
			data : {'user_id':user_id,'follow_id':follow_id},
			dataType : "json",
			success : function(data){
			    if (data == 1) {
				$(".content").empty();
				$(".content").append("<span style='font-size:30;background-color:#f8f8f8'>Following</span>");
			    }else{
				
				$(".content").empty();
				$(".content").append("<button type='button' class='btn btn-block btn-grey' id='follow'>Follow</button>");
			    }
			}
	    });
    
}

function follow_user(){
    var user_id = sessionStorage.getItem("user_id");
    var follow_id = sessionStorage.getItem("user_visitor_id");
    
    $.ajax({
			url : "./datafetch/follow_user.php",
			type : "post",
			async :false,
			data : {'user_id':user_id,'follow_id':follow_id},
			dataType : "json",
			success : function(data){
			    if (data == 1) {
				$(".content").empty();
				$(".content").append("<span style='font-size:30;background-color:#f8f8f8'>Following</span>");
			    }else{
				
				$(".content").empty();
				$(".content").append("<button type='button' class='btn btn-block btn-grey' id='follow'>Follow</button>");
			    }
			}
	    });
    
}

$(document).ready(function(){
        $(function(){
         profile_fetch();
	 //public_rate_review();
         display_post();
	 display_concert_post();
	 check_follow();
        })
	$(document).on('click','.content .btn',function(){
	    follow_user();
	});
        
    });