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
      require($_SERVER["DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/User.php");
      require($_SERVER["DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/Attachment.php");
      require($_SERVER["DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Facade/RelationWorkUser.php");
      if(isset($_POST["vcTitle"]) && isset($_POST["vcSummary"])){

          //1º Insert
        echo "<pre>";

          $Work = new Article();
          $Work->setIIdWork($Work->GetLastID("iIdWork"));//Set do last index

          $Work->setIIDTypeWork($_POST["iIdTypeWork"]);//Define o tipo de trabalho - este campo é uma foreign key da tb_worktype
          $Work->setIIdScope($_POST["iIdScope"]);
          $Work->setVcTitle($_POST["vcTitle"]);
          $Work->setVcSummary($_POST["vcSummary"]);
          $Work->InsertObject();

          //2º Insert
          $Attachment = new Attachment();
          $Attachment->setIIdAttachment($Attachment->GetLastID("iIdAttachment"));//Set do last index
          $Attachment->setIIdArticle($Work->getIIdWork());
          $Attachment->setBlAttachment($_FILES["file"]["tmp_name"]);
          $Attachment->setVcTitle($_FILES["file"]["name"]);
          $Attachment->setVcState("d");
          $Attachment->InsertObject();
        var_dump($_POST);
          //3º Insert
        foreach($_POST["membros"] as $element){
            $user = new User();
            $user->readObject($element);
          $RelationWorkUser = new RelationWorkUser();
          $RelationWorkUser->setIdRelation($RelationWorkUser->GetLastID("IdRelation"));//Set do last index
          
          $RelationWorkUser->setIIdUser($user->getIIdUser()); // Vai buscar o id consoante o vcusername escolhido na interface
          $RelationWorkUser->setIIdWork($Work->getIIdWork());
          if (in_array($element, $_POST["speakers"])){
              $mainAutor = true;
          }else{
            $mainAutor = false;
          }

        if ($element == $_POST["autorP"]){
            $autorP = true;
        }else{
            $autorP = false;
        }
          
          $RelationWorkUser->setBMainAuthor($mainAutor);
          $RelationWorkUser->setBSpeaker($autorP);
          $RelationWorkUser->InsertObject();

            }
          echo json_encode(["msg" => "Inserido com sucesso!"]);
        }
        else{
          echo json_encode(["msg" => "Algo deu errado!"]);
        }
