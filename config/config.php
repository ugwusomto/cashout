<?php 
session_start();
define('APP_NAME', 'cashout');
define("APP_PATH","http://localhost/cashout/");
define("JS_PATH","http://localhost/cashout/assets/js/");
define("CSS_PATH","http://localhost/cashout/assets/css/");
define("IMAGE_PATH","http://localhost/cashout/assets/images/");
define("MIN_DEPOSIT_AMOUNT", 1000);
define("MAX_DEPOSIT_AMOUNT", 1000000);
define("PAYSTACK_SK","");
define("TRANSACTION_TYPE",["DEPOSIT","INVESTMENT","WITHDRAWAL"]);



define("APP_EMAIL","support@cashout.com");

