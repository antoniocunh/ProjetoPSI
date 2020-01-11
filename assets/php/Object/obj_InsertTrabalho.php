<?php
    //  MUDAR TB ARTICLE PRA WORK

    /*
        O enviar trabalho precisa de fazer varios inserts:

        1º Insert da linha na tb_Article
            Table: tb_article
            Columns:
                iIdWork int(11)                 PK    
                iIDTypeWork int(11)             FK
                iIdScope int(11)                FK
                vcTitle varchar(100) 
                vcSummary varchar(500)

        2º Insert  da linha na tb_Attachment
                Table: tb_attachment
                Columns:
                iIdAttachement int(11)          PK 
                iIdArticle int(11)              FK
                blAttachment varchar(45) 
                vcState varchar(45)

        Depois de estas duas tbs terem as linhas referentes ao trabalho que tá a ser inserido,
            tem que se associar o trabalho que esta na tb_article ao user:

        3º Insert da linha na tb_relationworkuser
                Table: tb_relationworkuser
                Columns:
                idRelation int(11)              PK 
                iIdUser int(11)                 FK
                iIdWork int(11)                 FK
                tiMainAuthor tinyint(4) 
                tiSpeaker tinyint(4)

    */

      require($_SERVER["DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/Article.php");
      //if(isset($_POST["vcTitle"]) && isset($_POST["vcSummary"])){

          //1º Insert

          var_dump($_POST);
          $Work = new Article();
          echo $Work->GetLastID("iIdWork");
          $Work->setiIdWork($Work->GetLastID("iIdWork"));//Set do last index

          $Work->setiIDTypeWork($_POST["iIdTypeWork"]);//Define o tipo de trabalho - este campo é uma foreign key da tb_worktype
          $Work->setiIdScope($_POST["iIdScope"]);
          $Work->setvcTitle($_POST["vcTitle"]);
          $Work->setvcSummary($_POST["vcSummary"]);

          //$Work->InsertObject();

          //2º Insert
          /*
          $Attachment = new Attachment();
          $Attachment->setiIdWork($Attachment->GetLastID("iIdWork"));//Set do last index
          
          $Attachment->setiIDTypeWork($_POST["iIDTypeWork"]);
          $Attachment->setiIdScope($_POST["iIdScope"]);
          $Attachment->setvcTitle($_POST["vcTitle"]);
          $Attachment->setvcSummary($_POST["vcSummary"]);
          $Attachment->InsertObject();

          //3º Insert

          $RelationWorkUser = new RelationWorkUser();
          $RelationWorkUser->setiIdWork($RelationWorkUser->GetLastID("iIdWork"));//Set do last index
          
          $RelationWorkUser->setidRelation($_POST["idRelation"]);
          $RelationWorkUser->setiIdUser($_POST["iIdUser"]); // Vai buscar o id consoante o vcusername escolhido na interface
          $RelationWorkUser->setiIdWork($_POST["iIdWork"]);
          $RelationWorkUser->settiMainAuthor($_POST["tiMainAuthor"]);
          $RelationWorkUser->settiSpeaker($_POST["tiSpeaker"]);
          $RelationWorkUser->InsertObject();
          */
         /* echo json_encode(["msg" => "Inserido com sucesso!"]);
        }
        else{
            echo json_encode(["msg" => "Algo deu errado!"]);
        }*/
       
?>