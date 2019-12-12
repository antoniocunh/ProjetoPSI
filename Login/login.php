<?php
session_start();
require_once("../assets/php/library/configDatabase.php");
if(isset($_POST['login_button'])) {
	$user_email = trim($_POST['user_email']);
	$user_password = trim($_POST['password']);


  try
  { 
   $stmt = $conn->prepare("SELECT * FROM tbl_users WHERE user_email=:email");
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