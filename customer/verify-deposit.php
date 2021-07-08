<?php

require_once "../config/config.php";
require_once "../config/Db.php";
require_once "../controllers/Helper.php";
require_once "../controllers/User.php";
require_once "../controllers/Account.php";
require_once "../controllers/Transaction.php";



// check if url is valid
if (empty($_GET["trxref"])) {
    $path = APP_PATH."customer/home.php";
    header("Location: $path");
}



$txRef = $_GET["trxref"];



// check if value has been given before
if(!empty(Transaction::getDataByTxId($txRef))){
    $path = APP_PATH."customer/home.php";
    header("Location: $path");

}




  $curl = curl_init();
  
  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.paystack.co/transaction/verify/$txRef",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "Authorization: Bearer ".PAYSTACK_SK,
      "Cache-Control: no-cache",
    ),
  ));
  
  $response = curl_exec($curl);
  $err = curl_error($curl);
  curl_close($curl);
  
  if ($err) {
      echo "cURL Error #:" . $err;
  } else {
     $result =  json_decode($response);
     $nairaAmount = $result->data->amount/100;
     $user_id = $_SESSION["customer_id"];


     if($result->data->status == "success"){

      // update the persons account balance

      $sql = "UPDATE `accounts` SET `balance`=`balance`+'$nairaAmount' WHERE `user_id`='$user_id'";
      Account::updateRecord($sql);
      // record that transaction
      $type = TRANSACTION_TYPE[0];
      $sql= "INSERT INTO `transactions`(`user_id`,`amount`,`type`,`tx_id`,`status`) VALUES('$user_id','$nairaAmount','$type','$txRef','1')";
      echo 
      Transaction::create($sql);
      $path = APP_PATH."customer/home.php";
      header("Location: $path");
      exit();

     }else{

      $type = TRANSACTION_TYPE[0];
      $sql= "INSERT INTO `transactions`(`user_id`,`amount`,`type`,`tx_id`,`status`) VALUES('$user_id','$nairaAmount','$type','$txRef','0')";
      echo
      Transaction::create($sql);


      $path = APP_PATH."customer/home.php";
      header("Location: $path");
      exit();
     }

  }
