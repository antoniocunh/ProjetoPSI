$('document').ready(function() { 
	/* validação*/
	$("#login-form").validate({
		rules: {
			password: {
				required: true,
			},
			user_email: {
				required: true,
			},
		},
		messages: {
			password:{
			  required: "please enter your password"
			 },
			user_email: "please enter your username",
		},
		submitHandler: submitForm	
	});	   
	/* função de login */
	function submitForm() {		
		var data = $("#login-form").serialize();				
		$.ajax({				
			type : 'POST',
			url  : 'login.php',
			data : data,
			datatype: 'json',
			beforeSend: function(){	
				$("#error").fadeOut();
				$("#login_button").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
			},
			success : function(response){
				teste = JSON.parse(response);	
				console.log(response);
				if(teste.one =='ok'){										
					$("#login_button").html('<img src="ajax-loader.gif" /> &nbsp; Signing In ...');
					setTimeout(' window.location.href = "../Users/home-user-page.html"; ',0);
				} else {									
					$("#error").fadeIn(1000, function(){						
						$("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+teste.one+' !</div>');
						$("#login_button").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In');
					});
				}
			}
		});
		return false;
	}   
});