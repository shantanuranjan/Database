
function searh_user(search_text) {
   sessionStorage.setItem("search_text",search_text);
   window.location.href = "./user_search_page.php";
}

function search_artist(search_text) {
   sessionStorage.setItem("search_text",search_text);
   window.location.href = "./artist_search_page.php";
}

function search_genre(search_text) {
   sessionStorage.setItem("search_text",search_text);
   window.location.href = "./genre_search_page.php";
}

function search_concert(search_text) {
   sessionStorage.setItem("search_text",search_text);
   window.location.href = "./concert_search_page.php";
}

function search_concert_genre(search_text) {
   sessionStorage.setItem("search_text",search_text);
   sessionStorage.setItem("search_type","concert_genre");
   window.location.href = "./concert_search_page.php";
}

function search_artist_genre(search_text) {
   sessionStorage.setItem("search_text",search_text);
   sessionStorage.setItem("search_type","artist_genre");
   window.location.href = "./artist_search_page.php";
}

function search_concert_loction(search_text) {
   sessionStorage.setItem("search_text",search_text);
   sessionStorage.setItem("search_type","concert_location");
   window.location.href = "./concert_search_page.php";
}

function search_concert_artist(search_text) {
   sessionStorage.setItem("search_text",search_text);
   sessionStorage.setItem("search_type","concert_artist");
   window.location.href = "./concert_search_page.php";
}



function search_concert_date(search_text) {
   sessionStorage.setItem("search_text",search_text);
   sessionStorage.setItem("search_type","concert_date");
   window.location.href = "./concert_search_page.php";
}

function logout(){
	sessionStorage.clear();
	 $.ajax({
			url : "./datafetch/logout.php",
			type : "post",
			async :false,
			success : function(data){
				if(data == 1){
					window.location.href ="./login.php";
				}
			}
	    });
}

$(document).ready(function (){
    
   $("#searh_user").on('click',function(){
    var search_text = $("#search_text").val();
    if (search_text == null) {
      alert("Please enter search text");
    }else{
      searh_user(search_text);
    }
    });
   $("#search_artist").on('click',function(){
     var search_text = $("#search_text").val();
    if (search_text == null) {
      alert("Please enter search text");
    }else{
      search_artist(search_text);
    }
    });
   
   $("#search_genre").on('click',function(){
     var search_text = $("#search_text").val();
    if (search_text == null) {
      alert("Please enter search text");
    }else{
      search_genre(search_text);
    }
    });
   
   $("#search_concert").on('click',function(){
     var search_text = $("#search_text").val();
    if (search_text == null) {
      alert("Please enter search text");
    }else{
      search_concert(search_text);
    }
    });
   
   $("#search_concert_genre").on('click',function(){
     var search_text = $("#search_text").val();
    if (search_text == null) {
      alert("Please enter search text");
    }else{
      search_concert_genre(search_text);
    }
    });
   
   $("#search_artist_genre").on('click',function(){
     var search_text = $("#search_text").val();
    if (search_text == null) {
      alert("Please enter search text");
    }else{
      search_artist_genre(search_text);
    }
    });
   
   $("#search_concert_loction").on('click',function(){
     var search_text = $("#search_text").val();
    if (search_text == null) {
      alert("Please enter search text");
    }else{
      search_concert_loction(search_text);
    }
    });
   
   $("#search_concert_artist").on('click',function(){
     var search_text = $("#search_text").val();
    if (search_text == null) {
      alert("Please enter search text");
    }else{
      search_concert_artist(search_text);
    }
    });
   
   $("#search_concerts_date").on('click',function(){
     var search_text = $("#search_text").val();
    if (search_text == null) {
      alert("Please enter search text");
    }else{
      search_concert_date(search_text);
    }
    });
   
   $("#home").on('click',function(){
      window.location.href ="./user_profile.php";
   });
   $("#my_concerts").on('click',function(){
      window.location.href ="./my_concerts.php";
   });
   $("#my_artists").on('click',function(){
      window.location.href ="./my_artists.php";
   });
   
   $("#my_genres").on('click',function(){
      window.location.href ="./my_genres.php";
   });
   
   $("#update_profile").on('click',function(){
	      window.location.href ="./create_user_profile_updated.php";
	   });
   
   $("#log_out").on('click',function(){
	   logout();
   });
   
});