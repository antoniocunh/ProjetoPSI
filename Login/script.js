$('document').ready(function()
{ 
     /* validação */
  $("#login-form").validate({
      rules:
   {
   password: {
   required: true,
   },
   username: {
            required: true,
            },
    },
       messages:
    {
            password:{
                      required: "Por favor introduza a sua password"
                     },
            username: "Por favor introduza o seu username",
       },
    submitHandler: submitForm
       });  
    /* fim de validação */
    
    /* submeter login */
    function submitForm()
    {  
   var data = $("#login-form").serialize();
    
   $.ajax({
    
   type : 'POST',
   url  : 'login_process.php',
   data : data,
   beforeSend: function()
   { 
    $("#error").fadeOut();
    $("#btn-login").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
   },
   success :  function(response)
      {      
     if(response=="ok"){
         
      $("#btn-login").html('<img src="btn-ajax-loader.gif" /> &nbsp; A enviar...');
      setTimeout(' window.location.href = "home.php"; ',4000);
     }
     else{
         
      $("#error").fadeIn(1000, function(){      
    $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response+' !</div>');
           $("#btn-login").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In');
         });
     }
     }
   });
    return false;
  }
    /* fim de submição de login */
});