<?php 
require_once "../config/config.php";

if (empty($_SESSION['customer_id'])) {
      $path = APP_PATH."auth/login.php";
      header("Location: $path");
      exit();
  }


session_start();
session_destroy();
$url = APP_PATH;
header("Location: $url");
exit();
?>

