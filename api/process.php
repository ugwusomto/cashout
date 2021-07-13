<?php
require_once "../config/config.php";
require_once "../config/Db.php";
require_once "../controllers/Helper.php";
require_once "../controllers/User.php";
require_once "../controllers/Account.php";
require_once "../controllers/Transaction.php";
require_once "../controllers/Bank.php";






//condition checking for user registeration
if (!empty($_POST["register"])) {
    $message = [];
    $formData = [];
    extract($_POST);

    // check for username
    if (!empty($username)) {
        // check if username exists
        if (User::usernameExists($username)) {
            $message["errors"]["username"] = "Username already Exists";
        } else {
            $formData["username"] = Helper::sanitize($username, "lower");
        }
    } else {
        $message["errors"]["username"] = "Please enter username";
    }

    //process email
    if (!empty($email)) {
        //  check if email exists
        if (User::emailExists($email)) {
            $message["errors"]["email"] = "Email already exists";
        } else {
            $formData["email"] = Helper::sanitize($email, "lower");
        }
    } else {
        $message["errors"]["email"] = "Please enter email";
    }

    // check for password
    if (!empty($password)) {
        //  check for password length
        if ((strlen($password) < 6) || (strlen($password) > 8)) {
            $pmessage = (strlen($password) < 6) ? "Password must not be less than 6" : "Password must not be  greater than 8 char";
            $message["errors"]["password"] = $pmessage;
        } else {
            $formData["password"] = Helper::encrypt($password);
        }
    } else {
        $message["errors"]["password"] = "Please enter password";
    }

    if (empty($message["errors"])) {
        $result = User::register($formData);
        if (is_array($result) && !empty($result['id'])) {
            Account::create($result['id']);
        }
        $message = ($result == true) ? ["success"=>"Your registeration was successfull"] : ["errors"=>["failed"=>"Something went wrong , Please try again"]];
        $message["url"] = APP_PATH."auth/login.php";
        echo json_encode($message);
    } else {
        echo json_encode($message);
    }
}


//condition for user login
if (!empty($_POST['login'])) {
    $message = [];
    $formData = [];
    extract($_POST);


    //process email
    if (!empty($email)) {
        $formData["email"] = Helper::sanitize($email, "lower");
    } else {
        $message["errors"]["email"] = "Please enter email";
    }

    // check for password
    if (!empty($password)) {
        $formData["password"] = Helper::encrypt($password);
    } else {
        $message["errors"]["password"] = "Please enter password";
    }

    if (empty($message["errors"])) {
        $result = User::login($formData);
    
        if (!empty($result)) {
            User::setSession($result);
            if (!empty($rem)) {
                User::setCookie($result);
            }
            $message =  ["success"=>"Login  successfull","url"=>APP_PATH."customer/home.php"];
        } else {
            $message = ["errors"=>["failed"=>"Invalid Login Details"]];
        }
        echo json_encode($message);
    } else {
        echo json_encode($message);
    }
}




// process deposit section
if (!empty($_POST["processDeposit"])) {
    $message = [];
    $formData = [];
    extract($_POST);

    if (!empty($amount) && is_numeric($amount)) {
        if ($amount < MIN_DEPOSIT_AMOUNT) {
            $message["errors"]["amount"] = "Amount must not be less than ".html_entity_decode("&#8358;").number_format(MIN_DEPOSIT_AMOUNT, 0, ".", ",");
        } elseif ($amount > MAX_DEPOSIT_AMOUNT) {
            $message["errors"]["amount"] = "Amount must not be greater than ".html_entity_decode("&#8358;").number_format(MAX_DEPOSIT_AMOUNT, 0, ".", ",");
        } else {
            $formData["amount"] = Helper::sanitize($amount);
        }
    } else {
        $message["errors"]["amount"] = "Please enter a valid amount";
    }

    if (empty($message["errors"])) {

      $formData["email"] = $_SESSION["customer_email"];
      $formData["secretKey"] = PAYSTACK_SK;
      $formData["callback"] = APP_PATH."customer/verify-deposit.php";
      $result = (object) Account::initializePayment($formData);
      if($result->status){
        $message =  ["success"=>$result->message.", You will be redirected in few seconds...","url"=>$result->data->authorization_url];
      }else{
        $message["errors"]["failed"] = $result->message;
      }
      echo json_encode($message);
    }else{
      echo json_encode($message);

    }


}



// This handles investment
if(!empty($_POST["processInvestment"])){

    $message = [];
    $formData = [];
    extract($_POST);
    // check if the person has up to that amount
    $userAccount = (object) Account::getData();
    $investment_plan = (object) INVESTMENT_PLAN[$plan_id];
    if($amount > $userAccount->balance){
        $message["errors"]["balance"] = "Sorry you have insufficient balance to perform this investment";
    }else{
        $formData["amount"] = (float) $amount;
    }

    // check if the amount is less than the min
    if($amount < $investment_plan->min){
        $message["errors"]["min"] = "Minimum amount is ".html_entity_decode("&#8358;").number_format($investment_plan->min,0,".",",");
    }
   // check if the amount is less than the max
    if ($amount > $investment_plan->max) {
        $message["errors"]["max"] = "Maximum amount is ".html_entity_decode("&#8358;").number_format($investment_plan->max, 0, ".", ",");
    }


    if(empty($message["errors"])){

        $formData["info"] = json_encode(INVESTMENT_PLAN[$plan_id]);
        $formData["tx_id"] = Helper::generateTxRef();
        $formData["type"] = TRANSACTION_TYPE[1];
        $formData["user_id"] = $_SESSION["customer_id"];
        $formData["status"] = TRANSACTION_STATUS["active"];

        // deduct the amount from the persons account
        $newBalance = $userAccount->balance - $formData["amount"];
        $__user_id = $_SESSION["customer_id"];
        $sql = "UPDATE `accounts` SET `balance`='$newBalance' WHERE `user_id`='$__user_id'";
        $result =  Account::updateRecord($sql);
        if($result){
         extract($formData);
         // create an investment record in the transaction table'
         $sql = "INSERT INTO `transactions`(`user_id`,`amount`,`type`,`tx_id`,`info`,`status`) VALUES('$user_id','$amount','$type','$tx_id','$info','$status')";
         $result =  Transaction::create($sql);
         if($result){
            $message["success"] = "Investment successfully created";
            $message["url"] = APP_PATH."customer/home.php";
            echo json_encode($message);
         }else{
           $message["errors"]["insertion"] = "Failed to add investment record";
          echo json_encode($message);

         }
        }else{
          $message["errors"]["insertion"] = "Failed to updated balance record";
          echo json_encode($message);
        }
    }else{
      echo json_encode($message);
    }


    // echo json_encode(["success"=>"Investment Successfull","url"=>APP_PATH."customer/home.php"]);
}


// verify bank detain
if(!empty($_POST["verifyBank"])){
      extract($_POST);
      $message = [];
      $formData = [];
      
      $formData["account_no"] = $account_no;
      $formData["bank_code"] = $bank_code;
      $formData["secretKey"] = PAYSTACK_SK;


      $result = Bank::verifyBank($formData);
      if(!empty($result->status)){
         echo json_encode(["message"=>"Bank Detail Verified","success"=>true,"name"=>$result->data->account_name]);
      }else{
        echo json_encode(["error"=>true,"message"=>"Wrong Account Detail"]);
      }
}


// add an account detail
if(!empty($_POST["processBank"])){
        echo json_encode(["success"=>"Bank Added Successfully"]);

}