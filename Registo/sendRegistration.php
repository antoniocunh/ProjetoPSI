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
                $tipo = PDO::PARAM_INT | PDO::PARAM_INPUT_OUTPUT;
                break;
            case "nome":

                break;
            case "email":
                if (!filter_var($temp, FILTER_VALIDATE_EMAIL)) {
                    $_SESSION[$key] = false;
                }
                break;
            default:

                break;
        }

        echo $tipo . " - ";
        echo $count . " - ";
        echo $key;
        if ($_SESSION[$key]) {
            echo " = " .  $temp . " - true <br/>";
        } else {
            echo " = " .  $temp . " - false <br/>";
        }


        $registoValido = $registoValido && $_SESSION[$key];
        if ($key != "pass2") {
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
header('Location: ../Registo/registo.php');
