$('document').ready(function() 
{ 
	/* validação*/
	$("#login-form").validate({
		rules: 
		{
			idPassword: { required: true },
			idUsername: { required: true },
		},
		messages: 
		{
			idPassword:{ required: "please enter your password" },
			idUsername:{ required:"please enter your username" },
		},
		submitHandler: submitForm	
	});	   
	/* função de login */
	function submitForm() 
	{	
		var _Data = $("#login-form").serialize();	

		$.ajax({ 
			type : 'POST',
			url  : 'login.php',
			data : _Data,
			datatype: 'json',

			beforeSend: function()
			{	
				$("#div-error").fadeOut();
				$("#login_button").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; Aguarde ...');
			},
			success : function(response)
			{
				_Resp = JSON.parse(response);
				console.log(response);
				
				if(_Resp.msg =='ok')
				{										
					$("#login_button").html('<img src="ajax-loader.gif" /> &nbsp; A autenticar...');
					setTimeout(' window.location.href = "../Users/home-user-page.html"; ',0);
				} 
				else 
				{									
					$("#div-error").fadeIn(1000, function()
					{						
						$("#div-error").html('<div class="alert alert-danger">'+ _Resp.msg+'!</div>');
						$("#login_button").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Autenticar');
					});
				}
			}
		});
		return false;
	}   
});