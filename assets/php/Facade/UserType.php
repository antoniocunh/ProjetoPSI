<?php


/* ==================================================================== 
        CLASS USER_TYPE
====================================================================*/
    
require("../Base/Bridge.php");
    
       class UserType extends Bridge{
        
        private $iIdTypeUser;
        private $iIdPrice;
        private $vcDescription;
       
        
        //construtor da class usertype
        public function __construct(){
            parent::__construct("tb_UserType");
        }

    }