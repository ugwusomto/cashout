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
define("TRANSACTION_STATUS", ["success"=>1,"failed"=>0,"pending"=>3,"declined"=>2]);
define("INVESTMENT_PLAN",[
  [
    'name'=>'Basic',
    'min'=>1000,
    'max'=>10000,
    'duration'=>'30 days',
    'commission'=>10,
    'roi'=>20
  ],
  [
    'name'=>'Premium',
    'min'=>20000,
    'max'=>100000,
    'duration'=>'50 days',
    'commission'=>10,
    'roi'=>40
  ],
  [
    'name'=>'Professional',
    'min'=>500000,
    'max'=>10000000,
    'duration'=>'100 days',
    'commission'=>10,
    'roi'=>60
  ]
]);




define("APP_EMAIL","support@cashout.com");

