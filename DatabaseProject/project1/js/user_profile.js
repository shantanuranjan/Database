function profile_fetch(){
    var user_id = sessionStorage.getItem("user_id");
          $.ajax({
			url : "./datafetch/user_profile_home_fetch.php",
			type : "post",
			async :false,
			data : {'user_id':user_id},
			dataType : "json",
			success : function(data){
                            var recommended_artist = data[0];
			    if (recommended_artist[0] != null) {
				set_up_recommended_artist(recommended_artist);
			    }else{
				$(".recommended-artist").empty();
				$(".recommended-artist").append("<a href='#' class='list-group-item active text_label1'>Recommended artist</a>");
				$(".recommended-artist").append("<a href='#' class='list-group-item'>No Recommended Artist </a>");
			    }
			    
			     var recommended_concert = data[1];
			    if (recommended_concert[0] != null) {
				set_up_recommended_concert(recommended_concert);
			    }else{
				$(".recommended-concerts").empty();
				$(".recommended-concerts").append("<a href='#' class='list-group-item active text_label1'>Recommended Upcoming concerts</a>");
				$(".recommended-concerts").append("<a href='#' class='list-group-item'>No Recommended Upcoming Concerts </a>");
			    }
			    var user_concert_posts = data[2];
			    if (user_concert_posts[0] != null) {
				set_up_user_concert_posts(user_concert_posts);
			    }else{
				$(".user-concert-posts").empty();
				$(".user-concert-posts").append("<a href='#' class='list-group-item active text_label1'>Concert related posts -Users</a>");
				$(".user-concert-posts").append("<a href='#' class='list-group-item'>No Recommended Upcoming Concerts </a>");
			    }
			    
			    var artist_concert_posts = data[3];
			    if (artist_concert_posts[0] != null) {
				set_up_artist_concert_posts(artist_concert_posts);
			    }else{
				$(".artist-concert-posts").empty();
				$(".artist-concert-posts").append("<a href='#' class='list-group-item active text_label1'>Concert related posts -Artists</a>");
				$(".artist-concert-posts").append("<a href='#' class='list-group-item'>No Recommended Upcoming Concerts </a>");
			    }
			    
			    var user_post_artist = data[4];
			    if (user_post_artist[0] != null) {
				set_up_user_post_artist(user_post_artist);
			    }else{
				$(".public-artist-posts").empty();
				$(".public-artist-posts").append("<a href='#' class='list-group-item active text_label1'>Artist related posts</a>");
				$(".public-artist-posts").append("<a href='#' class='list-group-item'>No updates of artists</a>");
			    }
			    
			    var concert_rate_review = data[5];
			    if (concert_rate_review[0] != null){
				set_up_concert_rate_review(concert_rate_review);
			    }else{
				$(".public-rate-posts").empty();
				$(".public-rate-posts").append("<a href='#' class='list-group-item active text_label1'>Artist related posts</a>");
				$(".public-rate-posts").append("<a href='#' class='list-group-item'>No updates of artists</a>");
			    }
			}
	    });
    
}


function set_up_recommended_artist(recommended_artist) {
    $(".recommended-artist").empty();
    $(".recommended-artist").append("<a href='#' class='list-group-item active text_label1'>Recommended artist</a>");
    for(var i=0;i<recommended_artist.length;i++){
	$(".recommended-artist").append("<a href='#' id='"+recommended_artist[i].artist_id+"' class='list-group-item'>"+recommended_artist[i].name+"</a>");
    }
}

function set_up_recommended_concert(recommended_concert){
    
   $(".recommended-concerts").empty();
   $(".recommended-concerts").append("<a href='#' class='list-group-item active text_label1'>Recommended Upcoming concerts</a>");
    for(var i=0;i<recommended_concert.length;i++){
	var element = $("<a href='#' class='list-group-item' id="+recommended_concert[i].concert_id+"></a>");
	var element2 = $("<table class='table-bordered tablefont'></table>");
	element2.append("<tr><th colspan='2' class='text_label1'>"+recommended_concert[i].concert_name+"</th></tr>");
	element2.append("<tr><td>Concert by Artist:</td><td>"+recommended_concert[i].artist_name+"</td></tr>");
	element2.append("<tr><td>Date:</td><td>"+recommended_concert[i].date+"</td></tr>");
	element2.appendTo(element);
	element.appendTo(".recommended-concerts");
    } 
    
}

function  set_up_user_concert_posts(user_concert_posts){
    $(".user-concert-posts").empty();
    $(".user-concert-posts").append("<a href='#' class='list-group-item active text_label1'>Concert related posts -Users</a>");
    
    for(var i=0;i<user_concert_posts.length;i++){
	var element = $("<a href='#' class='list-group-item'></a>");
	var element2 = $("<table class='table-bordered tablefont'></table>");
	element2.append("<tr><th colspan='2' class='text_label1'>Posted by "+user_concert_posts[i].username+"</th></tr>");
	element2.append("<tr><td>Concert:</td><td>"+user_concert_posts[i].concert_name+"</td></tr>");
	element2.append("<tr><td>Date:</td><td>"+user_concert_posts[i].date+"</td></tr>");
	element2.append("<tr><td>Time:</td><td>"+user_concert_posts[i].time+"</td></tr>");
	element2.append("<tr><td>Artist:</td><td>"+user_concert_posts[i].artist_name+"</td></tr>");
	element2.append("<tr><td>Price:</td><td>"+user_concert_posts[i].price+"</td></tr>");
	element2.append("<tr><td>Availability:</td><td>"+user_concert_posts[i].availability+"</td></tr>");
	element2.append("<tr><td>Venue:</td><td>"+user_concert_posts[i].venue+"</td></tr>");
	element2.append("<tr><td>Ticket Link :</td><td>"+user_concert_posts[i].link+"</td></tr>");
	element2.append("<tr><td>Posted Information :</td><td>"+user_concert_posts[i].description+"</td></tr>");
	element2.appendTo(element);
	element.appendTo(".user-concert-posts");
    }
}

function set_up_artist_concert_posts(artist_concert_posts){
     $(".artist-concert-posts").empty();
    $(".artist-concert-posts").append("<a href='#' class='list-group-item active text_label1'>Concert related posts -Artists</a>");
    
    for(var i=0;i<artist_concert_posts.length;i++){
	var element = $("<a href='#' class='list-group-item'></a>");
	var element2 = $("<table class='table-bordered tablefont'></table>");
	element2.append("<tr><th colspan='2' class='text_label1'>Posted by "+artist_concert_posts[i].artist_name+"</th></tr>");
	element2.append("<tr><td>Concert:</td><td>"+artist_concert_posts[i].concert_name+"</td></tr>");
	element2.append("<tr><td>Date:</td><td>"+artist_concert_posts[i].date+"</td></tr>");
	element2.append("<tr><td>Time:</td><td>"+artist_concert_posts[i].time+"</td></tr>");
	element2.append("<tr><td>Artist:</td><td>"+artist_concert_posts[i].artist_name+"</td></tr>");
	element2.append("<tr><td>Price:</td><td>"+artist_concert_posts[i].price+"</td></tr>");
	element2.append("<tr><td>Availability:</td><td>"+artist_concert_posts[i].availability+"</td></tr>");
	element2.append("<tr><td>Venue:</td><td>"+artist_concert_posts[i].venue+"</td></tr>");
	element2.append("<tr><td>Ticket Link :</td><td>"+artist_concert_posts[i].link+"</td></tr>");
	element2.append("<tr><td>Posted Information :</td><td>"+artist_concert_posts[i].description+"</td></tr>");
	element2.appendTo(element);
	element.appendTo(".artist-concert-posts");
    }
}

function set_up_user_post_artist(user_post_artist) {
  $(".public-artist-posts").empty();
  $(".public-artist-posts").append("<a href='#' class='list-group-item active text_label1'>Artist related posts</a>");
   for(var i=0;i<user_post_artist.length;i++){
	var element = $("<a href='#' class='list-group-item'></a>");
	var element2 = $("<table class='table-bordered tablefont'></table>");
	element2.append("<tr><th colspan='2' class='text_label1'>Posted by "+user_post_artist[i].username+"</th></tr>");
	element2.append("<tr><td>Artist:</td><td>"+user_post_artist[i].artist_name+"</td></tr>");
	element2.append("<tr><td>Website:</td><td>"+user_post_artist[i].url+"</td></tr>");
	element2.append("<tr><td>Bio:</td><td>"+user_post_artist[i].bio+"</td></tr>");
	element2.append("<tr><td>Email:</td><td>"+user_post_artist[i].email+"</td></tr>");
	element2.append("<tr><td>Information:</td><td>"+user_post_artist[i].description+"</td></tr>");
	
	element2.appendTo(element);
	element.appendTo(".public-artist-posts");
    }
}

function set_up_concert_rate_review(concert_rate_review) {
    $(".public-rate-posts").empty();
    $(".public-rate-posts").append("<a href='#' class='list-group-item active text_label1'>Rate & Review</a>");
    for(var i=0;i<concert_rate_review.length;i++){
	var element = $("<a href='#' class='list-group-item'></a>");
	var element2 = $("<table class='table-bordered tablefont'></table>");
	element2.append("<tr><th colspan='2' class='text_label1'>Posted by "+concert_rate_review[i].username+"</th></tr>");
	element2.append("<tr><td>Concert :</td><td>"+concert_rate_review[i].concert_name+"</td></tr>");
	element2.append("<tr><td>Rating :</td><td>"+concert_rate_review[i].rating+"</td></tr>");
	element2.append("<tr><td>Review :</td><td>"+concert_rate_review[i].review+"</td></tr>");
	
	element2.appendTo(element);
	element.appendTo(".public-rate-posts");
    }
}
function display_post(){
    $("#post_list").empty();
        $.ajax({
			url : "./datafetch/display_artist_post.php",
			type : "post",
			async :false,
			data : {'user_id':sessionStorage.getItem('user_id')},
			dataType : "json",
			success : function(data){
			   if (data[0] != null ) {
				for(var i=0;i<data.length;i++){
				    var element = $("<li class='list-group-item border_list'></li>");
				    var element2 = $("<table class='table-bordered tablefont'></table>");
				    element2.append("<tr><th colspan='2' class='text_label1'>Artist Information posted by "+data[i].username+"</th></tr>");
				    element2.append("<tr><td>Artist:</td><td>"+data[i].artist_name+"</td></tr>");
				    element2.append("<tr><td>Website:</td><td>"+data[i].url+"</td></tr>");
				    element2.append("<tr><td>Genre:</td><td>"+data[i].genre_name+"</td></tr>");
				    element2.append("<tr><td>Bio:</td><td>"+data[i].bio+"</td></tr>");
				    element2.append("<tr><td>Email:</td><td>"+data[i].email+"</td></tr>");
				    element2.append("<tr><td>Information:</td><td>"+data[i].description+"</td></tr>");
				    element2.appendTo(element);
				    element.appendTo("#post_list");
				}
			   }else{
			    
			   }
			}
		});  
    
}
function display_concert_post(){
    $("#post_list").empty();
        $.ajax({
			url : "./datafetch/display_concert_post.php",
			type : "post",
			async :false,
			data : {'user_id':sessionStorage.getItem('user_id')},
			dataType : "json",
			success : function(data){
			   if (data[0] != null ) {
				for(var i=0;i<data.length;i++){
				    var element = $("<li class='list-group-item border_list'></li>");
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
				    element.appendTo("#post_list");
				}
			   }else{
			    
			   }
			}
		});  
    
}
function post_artist_info(){
    var user_id = sessionStorage.getItem("user_id");
    var username = sessionStorage.getItem("username");
    var name = $("#post_artist_name").text();
    var website = $("#post_artist_website").text();
    var genre = $("#post_artist_genre").text();
    var description = $("#post_artist_desc").text();
    var email = $("#post_artist_email").text();
    var info = $("#artist_post_info").val();
    
     $.ajax({
			url : "./datafetch/post_artist_info.php",
			type : "post",
			async :false,
			data : {'user_id':user_id,'username':username,'name':name,'website':website,'genre':genre,'description':description,'email':email,'info':info},
			dataType : "json",
			success : function(data){
			    if (data == 1) {
				display_post();
			    }else{
				$("#errortext1").html("Cannot post");
			    }
			}
		});   
}

function post_concerts_info(){
    var user_id = sessionStorage.getItem("user_id");
    var username = sessionStorage.getItem("username");
    var name = $("#post_concert_name").text();
    var artist_name = $("#post_concert_artist").text();
    var date = $("#post_concert_date").text();
    var time = $("#post_concert_time").text();
    var price = $("#post_concert_ticket").text();
    var availability = $("#post_concert_availability").text();
    var ticket_link = $("#post_concert_link").text();
    var venue = $("#post_concert_venue").text();
    var info = $("#concert_post_info").val();
    
     $.ajax({
			url : "./datafetch/post_concert_info.php",
			type : "post",
			async :false,
			data : {'user_id':user_id,'username':username,'name':name,'artist_name':artist_name,'date':date,'time':time,'price':price,'availability':availability,'ticket_link':ticket_link,'venue':venue,'info':info},
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

function add_concerts() {
    var user_id = sessionStorage.getItem("user_id");
    var username = sessionStorage.getItem("username");
    var name = $("#add_concert_name").val();
    var artist_name = $("#add_artist_name").val();
    var date = $("#add_concert_date").val();
    var time = $("#add_concert_time").val();
    var price = $("#add_concert_price").val();
    var availability = $("#add_concert_availability").val();
    var ticket_link = $("#add_concert_link").val();
    var venue = $("#add_concert_venue").val();
    
     $.ajax({
			url : "./datafetch/add_concert_info.php",
			type : "post",
			async :false,
			data : {'user_id':user_id,'username':username,'name':name,'artist_name':artist_name,'date':date,'time':time,'price':price,'availability':availability,'ticket_link':ticket_link,'venue':venue},
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

function fetch_artist_details(){
    var keyword = $("#artistname").val();
               $.ajax({
			url : "./datafetch/searchArtist.php",
			type : "post",
			async :false,
			data : {'keyword':keyword},
			dataType : "json",
			success : function(data){
                            if (data !=null) {
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

function fetch_concert_details() {
    var keyword = $("#concertname").val();
               $.ajax({
			url : "./datafetch/searchConcert.php",
			type : "post",
			async :false,
			data : {'keyword':keyword},
			dataType : "json",
			success : function(data){
                            if (data !=null) {
				$("#post_concert_name").html(data.concert_name);
				$("#post_concert_artist").html(data.name);
				$("#post_concert_date").html(data.date);
				$("#post_concert_time").html(data.time);
				$("#post_concert_ticket").html(data.price);
				$("#post_concert_availability").html(data.availability);
				$("#post_concert_link").html(data.ticket_link);
				$("#post_concert_venue").html(data.venue_name);
			    }else{
				$("#errortext2").html("Cannot find Concert");
			    }
			    
			}
		});   
}

function check_trustscore(){
	var score = sessionStorage.getItem('trust_score');
	if(score<5){
		$("#tab3").hide();
	}
	
};

function fetch_venue(){
	  $.ajax({
			url : "./datafetch/fetch_venue.php",
			type : "post",
			async :false,
			dataType : "json",
			success : function(data){
                  if(data !=null){
                	  $("#add_concert_venue").empty();
                	  for(var i=0;i<data.length;i++){
                		  $("#add_concert_venue").append("<option name="+data[i].venue_id+">"+data[i].venue_name+"</option>");
                	  }
                  }
			    
			}
		});   
	
}
$(document).ready(function(){
    $(function(){
      profile_fetch();
      display_post();
      check_trustscore();
    });
    
    $("#post").on('click',function(){
	var select = $(".tabs .tab-links").find(".active").children("a").attr("href");
	if (select == "#tab1") {
	    post_artist_info();
	}else if(select =="#tab2") {
	    post_concerts_info();
	}else if(select == "#tab3"){
	    add_concerts();
	}
    });
    
    $(".tabs .tab-links").on('click',function(){
	var select = $(".tabs .tab-links").find(".active").children("a").attr("href");
	if (select == "#tab1") {
	    display_post();
	}else if(select =="#tab2") {
	    display_concert_post();
	}else if(select == "#tab3"){
		fetch_venue();
	}
    });
    
    $("#searchartist").on('click',function(){
	    fetch_artist_details();
	});
    
      $("#searchconcert").on('click',function(){
	    fetch_concert_details();
	});
      
    
});