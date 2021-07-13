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
define("TRANSACTION_STATUS", ["success"=>1,"failed"=>0,"pending"=>3,"declined"=>2,"active"=>4]);
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

define("BANKS",array(
  array('id' => '1','name' => 'Access Bank','code'=>'044'),
  array('id' => '2','name' => 'Citibank','code'=>'023'),
  array('id' => '3','name' => 'Diamond Bank','code'=>'063'),
  array('id' => '4','name' => 'Dynamic Standard Bank','code'=>''),
  array('id' => '5','name' => 'Ecobank Nigeria','code'=>'050'),
  array('id' => '6','name' => 'Fidelity Bank Nigeria','code'=>'070'),
  array('id' => '7','name' => 'First Bank of Nigeria','code'=>'011'),
  array('id' => '8','name' => 'First City Monument Bank','code'=>'214'),
  array('id' => '9','name' => 'Guaranty Trust Bank','code'=>'058'),
  array('id' => '10','name' => 'Heritage Bank Plc','code'=>'030'),
  array('id' => '11','name' => 'Jaiz Bank','code'=>'301'),
  array('id' => '12','name' => 'Keystone Bank Limited','code'=>'082'),
  array('id' => '13','name' => 'Providus Bank Plc','code'=>'101'),
  array('id' => '14','name' => 'Polaris Bank','code'=>'076'),
  array('id' => '15','name' => 'Stanbic IBTC Bank Nigeria Limited','code'=>'221'),
  array('id' => '16','name' => 'Standard Chartered Bank','code'=>'068'),
  array('id' => '17','name' => 'Sterling Bank','code'=>'232'),
  array('id' => '18','name' => 'Suntrust Bank Nigeria Limited','code'=>'100'),
  array('id' => '19','name' => 'Union Bank of Nigeria','code'=>'032'),
  array('id' => '20','name' => 'United Bank for Africa','code'=>'033'),
  array('id' => '21','name' => 'Unity Bank Plc','code'=>'215'),
  array('id' => '22','name' => 'Wema Bank','code'=>'035'),
  array('id' => '23','name' => 'Zenith Bank','code'=>'057')
));




define("APP_EMAIL","support@cashout.com");

