function user_list_fetch(){
    var search_text = sessionStorage.getItem("search_text");
    
    
        sessionStorage.removeItem("search_text");
               $.ajax({
			url : "./datafetch/fetchUser.php",
			type : "post",
			async :false,
			data : {'keyword':search_text},
			dataType : "json",
			success : function(data){
                            if (data[0]!=null) {
                                set_up_user(data);
                            }else{
                              $("#post_list").empty();
                              $("#post_list").append("<li class='list-group-item border_list'>No Records found</li>");
                            }
			}
		});
    }


function set_up_user(data){
  $("#post_list").empty();

			   if (data[0] != null ) {
				for(var i=0;i<data.length;i++){
				    var element = $("<li class='list-group-item border_list'></li>");
				    var element2 = $("<table class='table-bordered tablefont' id="+data[i].user_id+"></table>");
				    element2.append("<tr><th colspan='2' class='text_label1'>User Information</th></tr>");
				    element2.append("<tr><td>Name:</td><td>"+data[i].name+"</td></tr>");
				    element2.append("<tr><td>Username :</td><td>"+data[i].username+"</td></tr>");
				    element2.appendTo(element);
				    element.appendTo("#post_list");
				}
			   }else{
			    
			   }
    
}  

$(document).ready(function(){
    $(function(){
      user_list_fetch();
    });
    
    $(document).on('click','#post_list .border_list',function(){
       var user_id = $(this).children(".tablefont").attr("id") ;
       sessionStorage.setItem("user_visitor_id",user_id);
       window.location.href ="./user_visitor_profile.php";
    });
    
});