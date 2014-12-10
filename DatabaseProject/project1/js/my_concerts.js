function concert_attended_fetch() {
    var user_id = sessionStorage.getItem("user_id");
     $.ajax({
			url : "./datafetch/fetch_attended_concert.php",
			type : "post",
			async :false,
			data : {'user_id':user_id},
			dataType : "json",
			success : function(data){
                           if(data != null){
                                set_up_attended(data)
                            }else{
                                $("#attended_concerts_table tbody").empty();
                                $("#attended_concerts_table tbody").append("<tr><td colspan =''4>No Records found</td></tr>");
                            }       
			}
	    });
}

function set_up_attended(data){
    $("#attended_concerts_table tbody").empty();
    for(var i=0;i<data.length;i++){
        var element = $("<tr id='"+data[i].concert_id+"'></tr>");
        element.append("<td class='concertname'>"+data[i].concert_name+"</td>");
        element.append("<td class='artistname'>"+data[i].name+"</td>");
        element.append("<td class='date'>"+data[i].date+"</td>");
        element.append("<td class='city'>"+data[i].city+"</td>");
        element.appendTo("#attended_concerts_table tbody");
    }
}

function concert_recommended_fetch() {
    var user_id = sessionStorage.getItem("user_id");
     $.ajax({
			url : "./datafetch/fetch_recommended_concert.php",
			type : "post",
			async :false,
			data : {'user_id':user_id},
			dataType : "json",
			success : function(data){
                            if(data != null){
                                set_up_recommended(data)
                            }else{
                                $("#recommended_concerts_table tbody").empty();
                                $("#recommended_concerts_table tbody").append("<tr><td colspan ='4'>No Records found</td></tr>");
                            }            
			}
	    });
}

function set_up_recommended(data){
    $("#recommended_concerts_table tbody").empty();
    for(var i=0;i<data.length;i++){
        var element = $("<tr id='"+data[i].concert_id+"'></tr>");
        element.append("<td>"+data[i].concert_name+"</td>");
        element.append("<td>"+data[i].name+"</td>");
        element.append("<td>"+data[i].date+"</td>");
        element.append("<td>"+data[i].city+"</td>");
        element.appendTo("#recommended_concerts_table tbody");
    }
}
function set_up_rate() {
    var user_id =sessionStorage.getItem("user_id");
    $("#rate_review_table tbody").empty();
    $.ajax({
			url : "./datafetch/fetch_rate_review.php",
			type : "post",
			async :false,
			data : {'user_id':user_id},
			dataType : "json",
			success : function(data){
                            if(data != null){
                              for(var i=0;i<data.length;i++){
                                 var element = $("<tr></tr>");
                                    element.append("<td>"+data[i].concert_name+"</td>");
                                    element.append("<td>"+data[i].name+"</td>");
                                    element.append("<td>"+data[i].date+"</td>");
                                    element.append("<td>"+data[i].rate+"</td>");
                                    element.append("<td>"+data[i].review+"</td>");
                                    element.appendTo("#rate_review_table tbody");
                              }
                            }            
			}
	    });
}

$(document).ready(function (){
    $(function(){
      concert_attended_fetch();
      concert_recommended_fetch();
      set_up_rate();
    });
$(document).on('click','#attended_concerts_table tr',function(){
        var id = $(this).attr("id");
        sessionStorage.setItem("attended_concert_id",id);
        $("#concert_name").html($(this).find(".concertname").html());
        $("#artist_name").html($(this).find(".artistname").html());
        $("#date").html($(this).find(".date").html());
});
    
    $("#post").on('click',function(){
        var user_id = sessionStorage.getItem("user_id");
        var concert_id = sessionStorage.getItem("attended_concert_id");
        var rate = $("#rate").val();
        var review = $("#review").val();
        $.ajax({
			url : "./datafetch/rate_review.php",
			type : "post",
			async :false,
			data : {'user_id':user_id,'concert_id':concert_id,'rate':rate,'review':review},
			dataType : "json",
			success : function(data){
                           if(data == 1){
                                set_up_rate();
                            }       
			}
	    });
    });
    
});