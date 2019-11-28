<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="../asset/css/paper-kit.css?v=2.2.0" rel="stylesheet" />
</head>

<body>
<?php 
        session_start();
        function fnValidateInput($name){
            if (isset($_SESSION[$name])){
                 if (!$_SESSION[$name][0]){ 
                    echo ' is-invalid " value="' . $_SESSION[$name][1] . '"';
                 }else{
                    echo '" value="' . $_SESSION[$name][1] . '"';
                 }
            }
        }

        function fnValidateInputMessage($name, $message){
            if (isset($_SESSION[$name])){
                 if (!$_SESSION[$name][0]){ 
                    echo '<small id="passwordHelp" class="text-danger">' . $message . '</small>';
                 }
            }
        }
    ?> 
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 col-lg-8 col-xl-6">
                    <form action="sendRegistration.php" method="post">
                        <div class="row">
                            <div class="col text-center">
                                <h1>Registar</h1>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col mt-4">
                                <input name="nome" type="text" placeholder="Nome" class="form-control <?php fnValidateInput('nome');?>">      
                                <?php fnValidateInputMessage('nome', 'Must be 8-20 characters long.'); ?>                                                                                             
                            </div>
                        </div>

                        <div class="row align-items-center">
                            <div class="col mt-4">
                                <input name="ultimoNome" type="text" placeholder="Sobrenome" class="form-control <?php fnValidateInput('ultimoNome');?>">      
                                <?php fnValidateInputMessage('ultimoNome', 'Must be 8-20 characters long.'); ?>    
                            </div>
                        </div>

                        <div class="row align-items-center">
                            <div class="col mt-4">
                                <input name="ambito" type="text" placeholder="Âmbito" class="form-control <?php fnValidateInput('ambito');?>">      
                                <?php fnValidateInputMessage('ambito', 'Must be 8-20 characters long.'); ?>    
                            </div>
                        </div>

                        <div class="row align-items-center">
                            <div class="col mt-4">
                                <input name="morada" type="text" placeholder="Morada" class="form-control <?php fnValidateInput('morada');?>">      
                                <?php fnValidateInputMessage('morada', 'Must be 8-20 characters long.'); ?>    
                            </div>
                        </div>

                        <div class="row align-items-center">
                            <div class="col mt-4">
                                <input name="telefone" type="text" placeholder="Número de Telemóvel" class="form-control <?php fnValidateInput('telefone');?>">      
                                <?php fnValidateInputMessage('telefone', 'Must be 8-20 characters long.'); ?>    
                            </div>
                        </div>

                        <div class="row align-items-center">
                            <div class="col mt-4">
                                <input name="pais" type="text" placeholder=" País" class="form-control <?php fnValidateInput('pais');?>">      
                                <?php fnValidateInputMessage('pais', 'Must be 8-20 characters long.'); ?>    
                            </div>
                        </div>

                        <div class="row align-items-center">
                            <div class="col mt-4">
                                <input name="cidade" type="text" placeholder=" Cidade" class="form-control <?php fnValidateInput('cidade');?>">      
                                <?php fnValidateInputMessage('cidade', 'Must be 8-20 characters long.'); ?>    
                            </div>
                        </div>

                        <div class="row align-items-center">
                            <div class="col mt-4">
                                <input name="codPostal" type="text" placeholder=" Código Postal" class="form-control <?php fnValidateInput('codpostal');?>">      
                                <?php fnValidateInputMessage('codpostal', 'Must be 8-20 characters long.'); ?>    
                            </div>
                        </div>

                        <div class="row align-items-center">
                            <div class="col mt-4">
                                <input name="organizacao" type="text" placeholder=" Organização" class="form-control <?php fnValidateInput('organizacao');?>">      
                                <?php fnValidateInputMessage('organizacao', 'Must be 8-20 characters long.'); ?>    
                            </div>
                        </div>


                        <div class="row align-items-center mt-4">
                            <div class="col">
                                <input name="email" type="email" placeholder="Email" class="form-control <?php fnValidateInput('email');?>">      
                                <?php fnValidateInputMessage('email', 'Must be 8-20 characters long.'); ?>    
                            </div>
                        </div>

                        <div class="row align-items-center">
                            <div class="col mt-4">
                                <input name="username" type="text" placeholder=" Username" class="form-control <?php fnValidateInput('username');?>">      
                                <?php fnValidateInputMessage('username', 'Must be 8-20 characters long.'); ?>    
                            </div>
                        </div>

                        <div class="row align-items-center mt-4">
                            <div class="col">
                                <input name="pass1" type="password" placeholder="Password" class="form-control <?php fnValidateInput('pass1');?>">      
                                <?php fnValidateInputMessage('pass1', 'Must be 8-20 characters long.'); ?>    
                            </div>
                            <div class="col">
                                <input name="pass2" type="password" placeholder="Confirmar Password" class="form-control <?php fnValidateInput('pass2'); ?>">      
                                <?php fnValidateInputMessage('pass2', 'Must be 8-20 characters long.'); 
                                session_destroy();?>    
                            </div>
                        </div>
                        <div class="row justify-content-start mt-4">
                            <div class="col">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input">
                                        I Read and Accept <a href="https://www.google.com">Terms and Conditions</a>
                                    </label>
                                </div>

                                <button class="btn btn-primary mt-4">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>

</html>