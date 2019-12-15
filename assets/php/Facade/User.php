<?php


/* ==================================================================== 
        CLASS USER
       ====================================================================*/
    
       require("../Base/Bridge.php");
    
       class User extends Bridge{
      
      
        private $iIdUser;
        private $iIdScope;
        private $vcName;
        private $vcLastName;
        private $Address;
        private $vcPhoneNumber;
        private $vcEmail;
        private $vcCountry;
        private $vcAfiliation;
        private $vcUsername;
        private $vcPassword;
        private $vcCity;
        private $vcPostalCode;
        private $dtBirth;
        private $iIdUserType;

        public function __construct(){
            parent::__construct("tb_User");
        }

    }

    $teste = new User();
    echo "<pre>";
    var_dump($teste->Update("vcName = teste", "vcName = 'António'"));
    var_dump($teste->Update("vcName", "teste"));
    echo "</pre>";


    
?>