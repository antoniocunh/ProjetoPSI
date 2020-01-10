<?php
  
  session_start();
  
  require_once($_SERVER["DOCUMENT_ROOT"] . "/ProjetoPSI/assets/php/Proprieties/ConfigDB.php"); //coneção à base de dados 
  

  if (isset($_POST["login_button"]))
  {
    $username = trim($_POST['username']);
    $userpassword = trim($_POST['password']);
    try 
    {
      $stmt = $conn->prepare("SELECT * FROM tb_user WHERE vcUsername=:username");
      $stmt->execute(array(":username" => $username));
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      $count = $stmt->rowCount();
      
      if ($row['vcPassword'] == hash("sha512", $userpassword . "_" . $row['dtBirth'])) // verificação da password com hash
      {
        $msg = "ok";
        $_SESSION['username'] = $row['vcUsername'];
        $_SESSION['password'] = $userpassword;
      } 
      else
      {
        $msg = "Utilizador ou palavra-passe estão errados";
      }
    } 
    catch (PDOException $e) {
      $msg = "Erro: Ao encontrar utilizador.".$e->getMessage();
    }finally{
      echo json_encode(array("msg" => $msg));
    }
  }
?>