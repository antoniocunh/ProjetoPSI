<?php
 session_start();
 require_once('../assets/php/library/configDatabase.php');

 if(isset($_POST['btn-login']))
 {
  $username = trim($_POST['username']);
  $user_password = trim($_POST['password']);
  
  // dúvida no hash da password
  $password = md5($user_password);
  
  try
  { 
  
   $stmt = $db_con->prepare("SELECT * FROM tb_User WHERE vcUsername=:username");
   $stmt->execute(array(":username"=>$username));
   $row = $stmt->fetch(PDO::FETCH_ASSOC);
   $count = $stmt->rowCount();
   
   if($row['vcPassword']==$password){
    
    echo "ok"; // log in
    $_SESSION['user_session'] = $row['idUser'];
   }
   else{
    
    echo "Username ou password não existem"; // dados errados
   }
    
  }
  catch(PDOException $e){
   echo $e->getMessage();
  }
 }

?>