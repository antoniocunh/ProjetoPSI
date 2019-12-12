<?php
session_start();
include_once("db_connect.php"); //meter aqui a nossa conecssao
if(isset($_POST['login_button'])) {
	$user_email = trim($_POST['user_email']);
	$user_password = trim($_POST['password']);


  try
  { 
  
   $stmt = $conn->prepare("SELECT * FROM tb_User WHERE vcemail=:email");
   $stmt->execute(array(":email"=>$user_email));
   $row = $stmt->fetch(PDO::FETCH_ASSOC);
   $count = $stmt->rowCount();
   
   if($row['user_password']==$password){
    
    echo "ok"; // log in
    $_SESSION['user_session'] = $row['user_id'];
   }
   else{
    
    echo "email or password does not exist."; // wrong details 
   }
    
  }
  catch(PDOException $e){
   echo $e->getMessage();
  }
 }

?>