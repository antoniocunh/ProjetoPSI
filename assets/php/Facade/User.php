<?php


/* ==================================================================== 
        CLASS USER
       ====================================================================*/
    
       require($_SERVER["DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Base/Bridge.php");
    
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

        
        //construtor da class user
        public function __construct(){
            parent::__construct("tb_User");
        }

    }
?>