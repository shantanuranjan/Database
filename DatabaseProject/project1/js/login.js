function validate_login(){
	var username  = $("#username").val();
	var password  = $("#password").val();
	var person =  $('input[name="radiooption"]:checked').val();
	var check = null;
	if(username == "" || password == ""){
		$("#errortext").html("Please enter valid Username and Password");
		return "false";
	}else if(person == ""){
		$("#errortext").html("Please select User or Artist");
		return "false";
	} else{
		$.ajax({
			url : "validate_login.php",
			type : "post",
			async :false,
			data : {'username':username,'password':password,'person':person},
			success : function(data){
				if(data == "true"){
					check = "true";
				}else{
					$("#errortext").html("Invalid Username and Password");
					check = "false";
				}
			}			
		});
	}
	return check;
}


function validate_register(){

	var username  = $("#reg_username").val();
	var password  = $("#reg_password").val();
	var repeat = $("#reg_repeat_password").val();
	var email = $("#reg_email").val();
	var emailRegex = /^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i;
	var person =  $('input[name="reg_radiooption"]:checked').val();
	var check =null;
	
	if(username == "" || password == "" || repeat == "" || email ==""){
		$("#errortext1").html("Please enter valid details");
		return "false";
	}else if(password!= repeat){
		$("#errortext1").html("Your password does not match");
		return "false";
	}else if(!emailRegex.test(email)){
		$("#errortext1").html("Please enter valid email address");
			return "false";
	}else if(person == ""){
		$("#errortext1").html("Please select User or Artist");
		return "false";
	}else{
	
		$.ajax({
			url : "validate_register.php",
			type : "post",
			async :false,
			data : {'username':username,'email':email,'person':person},
			success : function(data){
				if(data == "true"){
					check = "true";
				}else{
					$("#errortext1").html(data+" already exists!");
					check = "false";
				}
			}			
		});
	
	
	
	}
	return check;
}

$(document).ready(function(){
    
    $("#switch_reg").on("click",function(){
		
        $(".login").removeClass("active");
        $(".login").addClass("inactive");
        $(".register").removeClass("inactive");
        $(".register").addClass("active");
		$("#errortext1").empty();
    })
    
     $("#switch_login").on("click",function(){
        $(".register").removeClass("active");
        $(".register").addClass("inactive");
        $(".login").removeClass("inactive");
        $(".login").addClass("active");
		$("#errortext").empty();
    })
    
    $("#login").on("click",function(){
		var username  = $("#username").val();
		var password  = $("#password").val();
		var person =  $('input[name="radiooption"]:checked').val();
		var check = validate_login();
		if(check == "true"){
		
			$.ajax({
			url : "check_profile.php",
			type : "post",
			async :false,
			dataType: 'json',
			data : {'username':username,'person':person},
			success : function(data){
				if(person == "user"){
					sessionStorage.setItem('user_id',data.user_id);
					sessionStorage.setItem('username',data.username);
					sessionStorage.setItem('trust_score',data.trust_score);
					if(data.name == null || data.dob == null || data.city == null ){
						window.location.href="create_user_profile_updated.php?username="+username;
					}else{
						window.location.href="user_profile.php?username="+username;
					}
				}else{
					sessionStorage.setItem('artist_id',data.artist_id);
					if(data.name == null || data.website == null || data.description == null){
						window.location.href="artist_update_profile.php?username="+username;
					}else{
						window.location.href="artist_profile.php?username="+username;
					}
				}
			}			
		});
		
		}
	});
	
	$("#register").on("click",function(){
	
	var username  = $("#reg_username").val();
	var password  = $("#reg_password").val();
	var email = $("#reg_email").val();
	var person =  $('input[name="reg_radiooption"]:checked').val();
	
		var check = validate_register();
		if(check == "true"){
			$.ajax({
			url : "register.php",
			type : "post",
			async :false,
			data : {'username':username,'email':email,'person':person,'password':password},
			success : function(data){
				if(data == ""){
					$("#errortext1").html("You have been registered successfully,Please login to continue");
				}else{
					$("#errortext1").html(data);
				}
			}			
		});
		}
	})
    
    
});