/*! =========================================================
 *
 Paper Bootstrap Wizard - V1.0.1
*
* =========================================================
*
* Copyright 2016 Creative Tim (http://www.creative-tim.com/product/paper-bootstrap-wizard)
 *
 *                       _oo0oo_
 *                      o8888888o
 *                      88" . "88
 *                      (| -_- |)
 *                      0\  =  /0
 *                    ___/`---'\___
 *                  .' \|     |// '.
 *                 / \|||  :  |||// \
 *                / _||||| -:- |||||- \
 *               |   | \\  -  /// |   |
 *               | \_|  ''\---/''  |_/ |
 *               \  .-\__  '-'  ___/-. /
 *             ___'. .'  /--.--\  `. .'___
 *          ."" '<  `.___\_<|>_/___.' >' "".
 *         | | :  `- \`.;`\ _ /`;.`/ - ` : | |
 *         \  \ `_.   \_ __\ /__ _/   .-` /  /
 *     =====`-.____`.___ \_____/___.-`___.-'=====
 *                       `=---='
 *
 *     ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
 *
 *               Buddha Bless:  "No Bugs"
 *
 * ========================================================= */

// Paper Bootstrap Wizard Functions

searchVisible = 0;
transparent = true;

        $(document).ready(function(){

            /*  Activate the tooltips      */
            $('[rel="tooltip"]').tooltip();

            // Code for the Validator
            var $validator = $('.wizard-card form').validate({
                debug: true,
                errorElement: "div",
                rules: {
                    nome: {
                        required: true,
                        //pattern: "/^[a-zA-Z]+$/",
                    },
                    ultimoNome: {
                        required: true
                    },
                    scope: 'required',
                    morada: 'required',
                    telefone: 'required',
                    pais: 'required',
                    cidade: 'required',
                    dataNascimento: {
                        required: true,
                        maior18: true,
                        date: true
                    },
                    email: {
                        required: true,
                        email: true,
                        remote: {
                            url: "../assets/php/Object/obj.GetEmail.php",
                            type: "post",
                            data: {
                              username: function() {
                                return $( "#email" ).val();
                              }
                            }
                          }
                    },
                    username: {
                        required: true,
                        minlength: 4,
                        remote: {
                            url: "../assets/php/Object/obj.GetUsername.php",
                            type: "post",
                            pattern: "/^[a-zA-Z0-9]+$/",
                            data: {
                              username: function() {
                                return $( "#username" ).val();
                              }
                            }
                          }
                    },
                    pass1: {
                        required: true,
                        minlength: 8,
                    },
                    pass2: {
                        equalTo: "#pass1"
                    },
                },
                messages: {
                    nome:{
                        required: 'Por favor introduza um nome.',
                       // pattern: 'Por favor introduza um nome válido.',
                    },
                    ultimoNome: {
                        required: 'Por favor introduza um sobrenome.'
                    },
                    scope: 'Por favor selecione um âmbito.',
                    morada: 'Por favor introduza uma morada.',
                    telefone: 'Por favor introduza um nº de telefone.',
                    pais: 'Por favor selecione um pais.',
                    cidade: 'Por favor introduza uma cidade.',
                    dataNascimento:{
                        required: 'Por favor introduza a sua data de Nascimento',
                        maior18: 'Tem de ser maior de 18 para poder se registar.'
                    },
                    email: {
                        required: 'Por favor introduza um email.',
                        email: 'Por favor introduza um email válido.',
                    },
                    username: {
                        required: 'Por favor introduza um username.',
                        minlength: 'O username tem de ter pelo menos 4 caracteres.',
                        pattern: "O campo username não permite caracteres especiais ou numeros"
                    },
                    pass1: {
                        required: 'Por favor introduza uma palavra-passe.',
                        minlength: 'A palavra-passe tem de ter pelo menos 8 caractéres.',
                    },
                    pass2: {
                        required: 'Por favor introduza uma palavra-passe.',
                        equalTo: 'A palavra-passe não é igual á introduzida anteriormente'
                    },
                },
                submitHandler: function (form) {
                    var dataSerialized = $("#registo").serialize();
                    console.log(dataSerialized);

                    $.ajax({
                        url: '../assets/php/Object/obj.CreateUser.php',
                        type: 'POST',
                        data: dataSerialized,
                        success: function (msg) {
                            var text = JSON.parse(msg);
                            //alert(text.msg);
                            SuccessMsg(text);
                            //location.href = '../Login/index.php';
                        },
                        error: function(msg){
                            console.log(msg);
                        }
                    })
                }
            });

            function SuccessMsg(msg) {
                window.location = '../Login/index.php?msg='+msg;
            }


            // Wizard Initialization
          	$('.wizard-card').bootstrapWizard({
                'tabClass': 'nav nav-pills',
                'nextSelector': '.btn-next',
                'previousSelector': '.btn-previous',

                onNext: function(tab, navigation, index) {
                	var $valid = $('.wizard-card form').valid();
                	if(!$valid) {
                		$validator.focusInvalid();
                		return false;
                	}
                },

                onInit : function(tab, navigation, index){

                  //check number of tabs and fill the entire row
                  var $total = navigation.find('li').length;
                  $width = 100/$total;

                  navigation.find('li').css('width',$width + '%');

                },

                onTabClick : function(tab, navigation, index){

                    var $valid = $('.wizard-card form').valid();

                    if(!$valid){
                        return false;
                    } else{
                        return true;
                    }

                },

                onTabShow: function(tab, navigation, index) {
                    var $total = navigation.find('li').length;
                    var $current = index+1;

                    var $wizard = navigation.closest('.wizard-card');

                    // If it's the last tab then hide the last button and show the finish instead
                    if($current >= $total) {
                        $($wizard).find('.btn-next').hide();
                        $($wizard).find('.btn-finish').show();
                    } else {
                        $($wizard).find('.btn-next').show();
                        $($wizard).find('.btn-finish').hide();
                    }

                    //update progress
                    var move_distance = 100 / $total;
                    move_distance = move_distance * (index) + move_distance / 2;

                    $wizard.find($('.progress-bar')).css({width: move_distance + '%'});
                    //e.relatedTarget // previous tab

                    $wizard.find($('.wizard-card .nav-pills li.active a .icon-circle')).addClass('checked');

                }
	        });


                // Prepare the preview for profile picture
                $("#wizard-picture").change(function(){
                    readURL(this);
                });

                $('[data-toggle="wizard-radio"]').click(function(){
                    wizard = $(this).closest('.wizard-card');
                    wizard.find('[data-toggle="wizard-radio"]').removeClass('active');
                    $(this).addClass('active');
                    $(wizard).find('[type="radio"]').removeAttr('checked');
                    $(this).find('[type="radio"]').attr('checked','true');
                });

                $('[data-toggle="wizard-checkbox"]').click(function(){
                    if( $(this).hasClass('active')){
                        $(this).removeClass('active');
                        $(this).find('[type="checkbox"]').removeAttr('checked');
                    } else {
                        $(this).addClass('active');
                        $(this).find('[type="checkbox"]').attr('checked','true');
                    }
                });

                $('.set-full-height').css('height', 'auto');

            });



         //Function to show image before upload

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#wizardPicturePreview').attr('src', e.target.result).fadeIn('slow');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }


        function debounce(func, wait, immediate) {
        	var timeout;
        	return function() {
        		var context = this, args = arguments;
        		clearTimeout(timeout);
        		timeout = setTimeout(function() {
        			timeout = null;
        			if (!immediate) func.apply(context, args);
        		}, wait);
        		if (immediate && !timeout) func.apply(context, args);
        	};
        };


(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-46172202-1', 'auto');
ga('send', 'pageview');
