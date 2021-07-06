<?php 
require_once "../config/config.php";
require_once "../config/Db.php";
require_once "../controllers/Helper.php";
require_once "../controllers/User.php";
require_once "../controllers/Account.php";




//condition checking for user registeration
if(!empty($_POST["register"])){

  $message = [];
  $formData = [];
  extract($_POST);

  // check for username
  if(!empty($username)){
      // check if username exists
      if(User::usernameExists($username)){
        $message["errors"]["username"] = "Username already Exists";
      }else{
        $formData["username"] = Helper::sanitize($username,"lower");
      }
  }else{
    $message["errors"]["username"] = "Please enter username";
  }

  //process email
  if(!empty($email)){
    //  check if email exists
    if(User::emailExists($email)){
      $message["errors"]["email"] = "Email already exists";
    }else{
      $formData["email"] = Helper::sanitize($email,"lower");
    }
  }else{
    $message["errors"]["email"] = "Please enter email";
  }

  // check for password
  if(!empty($password)){
    //  check for password length
    if((strlen($password) < 6) || (strlen($password) > 8)){
      $pmessage = (strlen($password) < 6) ? "Password must not be less than 6" : "Password must not be  greater than 8 char";
      $message["errors"]["password"] = $pmessage;
    }else{
      $formData["password"] = Helper::encrypt($password);
    }
    
  }else{
    $message["errors"]["password"] = "Please enter password";
  }

  if(empty($message["errors"])){
    $result = User::register($formData);
    if(is_array($result) && !empty($result['id'])){
     Account::create($result['id']);

    }
    $message = ($result == true) ? ["success"=>"Your registeration was successfull"] : ["errors"=>["failed"=>"Something went wrong , Please try again"]];
    $message["url"] = APP_PATH."auth/login.php";
    echo json_encode($message); 
  }else{
    echo json_encode($message);
  }


}


//condition for user login
if(!empty($_POST['login'])){

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
    
      if(!empty($result)){
        User::setSession($result);
        if(!empty($rem)){
          User::setCookie($result);
        }
        $message =  ["success"=>"Login  successfull","url"=>APP_PATH."customer/home.php"];
      }else{
        $message = ["errors"=>["failed"=>"Invalid Login Details"]];
      }
      echo json_encode($message);
  } else {
      echo json_encode($message);
  }

}
