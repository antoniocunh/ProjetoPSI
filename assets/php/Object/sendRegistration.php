<?php
require($_SERVER["DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Proprieties/ConfigDB.php");

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
}

function fnValidateVariable($sName, &$list)
{
    if (isset($_POST[$sName])) {
        $temp = $_POST[$sName];
        $tipo = PDO::PARAM_STR;
        echo $sName . " - " . $_POST[$sName]. "<br>";
        $valid = true;
        switch ($sName) {
            case "ambito":
                $tipo = PDO::PARAM_INT;
                break;
            case "email":
                if (!filter_var($temp, FILTER_VALIDATE_EMAIL)) {
                    $valid = false;
                }
                break;
            case "organizacao":
            case "codPostal":
                $valid = true;
                break;
            case "pass1":
            case "username":
            case "dataNascimento":
                $list[$sName] = $_POST[$sName];
                break;
            case "pass2";
                $tipo = -1;
                if ($temp != $list["pass1"][1]) {
                    $valid = false;
                } else {
                    $saltedPassword = $list['pass1'][1] . "_" . $list["dataNascimento"][1];
                    $list["pass1"][1] = hash("sha512", $saltedPassword);
                }
                break;
            default:
                break;
        }
        return array($valid, $temp, $tipo);
    }
}
function formatData()
{
    $registoValido = true;
    foreach ($_POST as $key => $value) {
        $newUser[$key] = fnValidateVariable($key, $newUser);
        $registoValido = $registoValido && $newUser[$key][0];
    }
    $newUser['valid'] = $registoValido;
    return $newUser;
}
try {
    $stmt = $conn->prepare("insert into tb_User(vcName, vcLastName, iIdScope, vcPhoneNumber, dtBirth, vcCountry, vcCity, vcAddress, vcPostalCode, vcAfiliation, vcUsername, vcEmail , vcPassword) 
    values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $count = 1;
    $newUser = formatData();
    if ($newUser['valid']) {
        foreach ($newUser as $key => $value) {
            if (isset($newUser[$key][2])) {
                if ($newUser[$key][2] != -1) {
                    $stmt->bindValue($count++, $newUser[$key][1], $newUser[$key][2]);
                }
            }
        }
        $stmt->execute();
        session_start();
        $_SESSION["username"] = $newUser["username"][1];
        $_SESSION["password"] = $newUser["pass1"][1];
        header("location: " .  $_SERVER["DOCUMENT_NAME"] . "/ProjetoPSI/Dashboard/pages/perfil.php");
    }else{
        header("location: " .  $_SERVER["DOCUMENT_NAME"] . "/ProjetoPSI/Registo/index.html");
    }
} catch (PDOException $e) {
    fnDiminuirAutoIncrement($conn);
    echo $e->getMessage();
}
