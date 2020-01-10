<?php
 function Testing()
    {
        $arrayFieldsScope = array();
        array_push($arrayFieldsScope, "iIdScope");
        array_push($arrayFieldsScope, "vcName");

        $arrayOperators = array();
        array_push($arrayOperators, "=");
        array_push($arrayOperators, htmlspecialchars("<"));
        array_push($arrayOperators, "=");

        $arrayConectors = array();
        array_push($arrayConectors, "OR");
        array_push($arrayConectors, "AND");

        $arrayAlias = array();
        array_push($arrayAlias, "User");
        array_push($arrayAlias, "SCO");

        $Columns = array
        (
            array(null,"vcName"),
            array("SCO","vcName")
        );

        $arrayJoin = array(
            array("vcName", "vcName")
         );

         //================================================UPDATE
         $arrayFieldsUser = array(
            "vcName",
            "vcLastName"
        );

         $arrayWhere = array(
            array("vcName","=","AND"),
            array("vcLastName","=",null)
         );

        $aData = array(
            "11",
            "22",
            "buceta",
            "porno"
        );

        //$Query=$this->Select();
        $Query=
            $this->SelectJoin($Columns).
            $this->Join("tb_scope", "SCO", $arrayJoin, Joins::INNER);
            $this->Where($arrayWhere).
            $this->OrderBy($arrayFieldsUser);
            //$this->Update($arrayFieldsUser, $arrayWhere, $aData);

        echo $Query."<br>"."<br>";
        $this->QueryExecute($Query,$aData);
        //var_dump($this->QueryExec($Query));
    }

    
    require($_SERVER["DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/RelationWorkUser.php");
    
    $Evaluation = new RelationWorkUser();
    $Columns = array
    (
        array("TBA", "iIDTypeWork"),
        array("TBU", "iIdUser"),
        array("TBA", "vcTitle"),
        array("TBU", "vcName"),
        array("TBU", "vcLastName"),
        array(null, "bMainAuthor"),
        array(null, "bSpeaker")
    );
    
    $Query = 
    $Evaluation->SelectJoin($Columns).
    $Evaluation->Join("tb_article", "TBA", [["iIdWork", "iIdWork"]], Joins::INNER).
    $Evaluation->Join("tb_user", "TBU", [["iIDUser", "iIDUser"]], Joins::INNER).
    $Evaluation->Where([["bMainAuthor", '=', null ]], true);

    /*

    SELECT 
        TBA.iIDTypeWork AS idWork,
        TBU.iIdUser AS idUser,
        TBA.vcTitle,
        TBU.vcName,
        TBU.vcLastName,
        TBRWU.tiMainAuthor,
        TBRWU.tiSpeaker
    FROM tb_relationworkuser AS TBRWU
    INNER JOIN  tb_article AS TBA ON
        TBA.iIdWork = TBRWU.iIdWork
    INNER JOIN  tb_user AS TBU ON
        TBU.iIDUser = TBRWU.iIDUser
    WHERE 
        TBRWU.tiMainAuthor =1

    http://localhost/ProjetoPSI/Dashboard/pages/avaliar.php
    
    */
    echo json_encode($Evaluation->QueryExecute($Query, ["1"]), JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);

    /*I've tried cleaning the string to conform to UTF-8 without any success. What worked for me - setting MySQL Names to UTF-8 prior to populating the array: 
        $mysqli->query("SET NAMES 'utf8'"); Now all special characters are displayed perfectly fine. */
?>