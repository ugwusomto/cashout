<?php 
require_once "../config/config.php";
 require_once "../config/Db.php";
 require_once "../controllers/User.php";


if (empty($_SESSION['customer_id'])) {
      $path = APP_PATH."auth/login.php";
      header("Location: $path");
      exit();
  }


session_start();
session_destroy();
User::setCookie([],"unset");
$url = APP_PATH;
header("Location: $url");
exit();
?>

