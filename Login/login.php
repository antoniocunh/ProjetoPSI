<?php
session_start();
require_once("../assets/php/library/configDatabase.php");
if (isset($_POST["login_button"])) {
  $user_email = trim($_POST['username']);
  $user_password = trim($_POST['password']);
  try {
    $stmt = $conn->prepare("SELECT * FROM tb_User WHERE vcUserName=:email");
    $stmt->execute(array(":email" => $user_email));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $count = $stmt->rowCount();
    if ($row['vcPassword'] == hash("sha512", $user_password . "_" . $row['dtBirth'])) {
      $msg = "ok";
      echo json_encode(array("msg" => $msg)); // log in
      $_SESSION['user_session'] = $row['iIdUser'];
    } else {

      echo "email or password does not exist."; // wrong details 
    }
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}
