<?php
session_start();
require_once("../assets/php/library/configDatabase.php");
if(isset($_POST['login_button'])) {
	$user_email = trim($_POST['user_email']);
	$user_password = trim($_POST['password']);

   /* 
    
	$sql = "SELECT uid, user, pass, email FROM users WHERE email='$user_email'";
	$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
	$row = mysqli_fetch_assoc($resultset);	
	
    
    
    $sql = $conn->prepare("SELECT uid, user, pass, email FROM users WHERE email='$user_email'");
    $sql -> execute();
    
    
    
	if($row['pass']==$user_password){				
		echo "ok";
		$_SESSION['user_session'] = $row['uid'];
	} else {				
		echo "email or password does not exist."; // wrong details 
	}		
}
?>

*/
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