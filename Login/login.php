<?php
session_start();
require_once("../assets/php/library/configDatabase.php");
if (isset($_POST["login_button"])) {
  $username = trim($_POST['username']);
  $userpassword = trim($_POST['password']);
  try {
    $stmt = $conn->prepare("SELECT * FROM tb_User WHERE vcUserName=:username");
    $stmt->execute(array(":username" => $username));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $count = $stmt->rowCount();
    if ($row['vcPassword'] == hash("sha512", $userpassword . "_" . $row['dtBirth'])) {
      $msg = "ok";
      echo json_encode(array("msg" => $msg)); // log in
      $_SESSION['user_session'] = $row['iIdUser'];
    } else {

      echo "Username or Password doesn't exist."; // wrong details 
    }
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}
