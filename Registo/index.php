<<<<<<< HEAD:Registo/registo.php
<?php
session_start();
require('../connection/config.php');

function fnDiminuirAutoIncrement($conn)
{
    $stmt = $conn->prepare("SELECT `AUTO_INCREMENT`
        FROM  INFORMATION_SCHEMA.TABLES
        WHERE TABLE_SCHEMA = 'ppsi-2019-gr5'
        AND   TABLE_NAME   = 'tb_User';");
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_BOTH);
    $stmt = $conn->prepare("ALTER TABLE tb_User AUTO_INCREMENT = ?");
    $newAuto = $result['AUTO_INCREMENT'] - 1;
    $stmt->bindParam(1, $newAuto, PDO::PARAM_INT);
    $stmt->execute();
    echo $newAuto;
}

function fnValidateVariable($sName)
{
    if (isset($_POST[$sName]) && $_POST[$sName] != "") {
        $temp = array(true, $_POST[$sName]);
        $_SESSION[$sName] = $temp;
        return $_POST[$sName];
    }
    $temp = array(false, "");
    $_SESSION[$sName] = $temp;
    return " ";
}
/*echo "insert into tb_User(vcName, vcLastName, iIdScope,  vcAddress, vcPhoneNumber, vcCountry, vcCity, vcPostalCode, vcAfiliation, vcEmail, vcUsername, vcPassword) 
values(";*/

if (isset($_POST['submit'])) {
    try {
        $registoValido = true;
        $stmt = $conn->prepare("insert into tb_User(vcName, vcLastName, iIdScope,  vcAddress, vcPhoneNumber, vcCountry, vcCity, vcPostalCode, vcAfiliation, vcEmail, vcUsername, vcPassword) 
    values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $count = 1;
        foreach ($_POST as $key => $value) {
            $temp = fnValidateVariable($key);
            $tipo = PDO::PARAM_STR;

            switch ($key) {
                case "ambito":
                    $tipo = PDO::PARAM_INT;
                    break;
                case "nome":

                    break;
                case "email":
                    if (!filter_var($temp, FILTER_VALIDATE_EMAIL)) {
                        $_SESSION[$key][0] = false;
                    }
                    break;
                default:

                    break;
            }

            echo $tipo . " - ";
            echo $count . " - ";
            echo $key;
            if ($_SESSION[$key][0]) {
                echo " = " .  $temp . " - true <br/>";
            } else {
                echo " = " .  $temp . " - false <br/>";
            }


            $registoValido = $registoValido && $_SESSION[$key];
            if ($key != "pass2" || $key != "submit") {
                //echo $temp . ", ";
                $stmt->bindValue($count++, $temp, $tipo);
            }
        }
        if ($registoValido) {
            $stmt->execute();
            //echo "Utilizador Adicionado";

        }
    } catch (PDOException $e) {
        fnDiminuirAutoIncrement($conn);
        //echo "Erro ao registrar";
    }
}
?>

    <!DOCTYPE html>
    <html lang="pt">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registo</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="default.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    </head>

    <body>
        <?php
        function fnValidateInput($name)
        {
            if (isset($_SESSION[$name])) {
                if (!$_SESSION[$name][0]) {
=======
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="../asset/css/paper-kit.css?v=2.2.0" rel="stylesheet"/>
</head>

<body>
<?php 
        session_start();
        function fnValidateInput($name){
            if (isset($_SESSION[$name])){
                 if (!$_SESSION[$name][0]){ 
>>>>>>> 74a84edd3667d57e8ed81ae6fe2f3828f8f50b57:Registo/index.php
                    echo ' is-invalid " value="' . $_SESSION[$name][1] . '"';
                } else {
                    echo '" value="' . $_SESSION[$name][1] . '"';
                }
            }
        }

        function fnValidateInputMessage($name, $message)
        {
            if (isset($_SESSION[$name])) {
                if (!$_SESSION[$name][0]) {
                    echo '<small id="passwordHelp" class="text-danger">' . $message . '</small>';
                }
            }
        }
        ?>
        <section>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-8 col-lg-8 col-xl-6">
                        <form name=registo action="" method="post">
                            <div class="row">
                                <div class="col text-center">
                                    <h1>Registar</h1>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col mt-4">
                                    <input name="nome" type="text" placeholder="Nome" class="form-control">
                                </div>
                            </div>

                            <div class="row align-items-center">
                                <div class="col mt-4">
                                    <input name="ultimoNome" type="text" placeholder="Sobrenome" class="form-control">
                                </div>
                            </div>

                            <div class="row align-items-center">
                                <div class="col mt-4">
                                    <input name="ambito" type="text" placeholder="Âmbito" class="form-control">
                                </div>
                            </div>

                            <div class="row align-items-center">
                                <div class="col mt-4">
                                    <input name="morada" type="text" placeholder="Morada" class="form-control">
                                </div>
                            </div>

                            <div class="row align-items-center">
                                <div class="col mt-4">
                                    <input name="telefone" type="text" placeholder="Número de Telemóvel" class="form-control">
                                </div>
                            </div>

                            <div class="row align-items-center">
                                <div class="col mt-4">
                                    <input name="pais" type="text" placeholder=" País" class="form-control">
                                </div>
                            </div>

                            <div class="row align-items-center">
                                <div class="col mt-4">
                                    <input name="cidade" type="text" placeholder=" Cidade" class="form-control">
                                </div>
                            </div>

                            <div class="row align-items-center">
                                <div class="col mt-4">
                                    <input name="codPostal" type="text" placeholder=" Código Postal" class="form-control">
                                </div>
                            </div>

                            <div class="row align-items-center">
                                <div class="col mt-4">
                                    <input name="organizacao" type="text" placeholder=" Organização" class="form-control">
                                </div>
                            </div>


                            <div class="row align-items-center mt-4">
                                <div class="col">
                                    <input name="email" type="email" placeholder="Email" class="form-control">
                                </div>
                            </div>

                            <div class="row align-items-center">
                                <div class="col mt-4">
                                    <input name="username" type="text" placeholder=" Username" class="form-control">
                                </div>
                            </div>

                            <div class="row align-items-center mt-4">
                                <div class="col">
                                    <input name="pass1" type="password" placeholder="Password" class="form-control">
                                </div>
                                <div class="col">
                                    <input name="pass2" type="password" placeholder="Confirmar Password" class="form-control">
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

                                    <input type="submit" name="submit" value="Submit" class="btn btn-primary mt-4" />
                                </div>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </section>
        <script src="registo.js"></script>
    </body>

    </html>