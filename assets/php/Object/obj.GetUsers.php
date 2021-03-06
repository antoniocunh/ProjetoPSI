<?php
//Mudar para o Bridge ou o Facade Que Interage com isto Provavelmente um Register.php
    require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Object/Roles/obj.VerifyLogin.php");
    require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Object/Roles/obj.VerifyAdminRole.php");
    require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/class.User.php");
    $user = new User();
    $Columns = array
    (
        "vcUsername",
        "vcName",
        "vcLastName",
        "vcAddress",
        "vcCountry",
        "vcCity",
        "vcPostalCode",
        "vcEmail",
        "vcPhoneNumber",
        "vcAfiliation",
        "iIdScope"
    );

    
    $Query = $user->Select($Columns);

    echo json_encode($user->QueryExec($Query), JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);

    /*I've tried cleaning the string to conform to UTF-8 without any success. What worked for me - setting MySQL Names to UTF-8 prior to populating the array: 
        $mysqli->query("SET NAMES 'utf8'"); Now all special characters are displayed perfectly fine. */
