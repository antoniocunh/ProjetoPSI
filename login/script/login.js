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
			idPassword:{ required: "Por Favor introduza a sua Password" },
			idUsername:{ required:"Por Favor introduza o seu Username" },
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

				if(_Resp.msg =='ok')
				{										
					$("#login_button").html('A autenticar...');
					setTimeout(' window.location.href = "../Users/home-user-page.php"; ');
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