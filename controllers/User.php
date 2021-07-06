<?php

class User extends Db
{

  private static $tableName = "users";

  
  /**
   * @desc This function handles  user registration
   * @param Array $data
   * @return Boolean (true or False)
   */
    public static function register($data = [])
    {
        extract($data);
        return self::insert("INSERT INTO ".self::$tableName."(`username`,`email`,`password`) VALUES('$username','$email','$password')",true);
    }


    /**
     * @desc This function handles  user login
     * @param Array $data
     * @return Array user data
     */
    public static function login($data = [])
    {
      extract($data);
      $sql = "SELECT * FROM ".self::$tableName." WHERE `email`='$email' AND `password`='$password'";
      $result = self::fetchOne($sql);
      return $result;
    }

    /**
   * @desc This function checks if email exists
   * @param String $email
   * @return Array user data
   */
    public static function emailExists($email)
    {
      $sql = "SELECT * FROM ".self::$tableName." WHERE `email`='$email'";
      $result = empty(self::fetchOne($sql)) ? false : true;
      return $result;
    }

    /**
   * @desc This function checks if username exists
   * @param String $username
   * @return Boolean user data
   */
    public static function usernameExists($username)
    {
            $sql = "SELECT * FROM ".self::$tableName." WHERE `username`='$username'";
      $result = empty(self::fetchOne($sql)) ? false : true;
      return $result;

    }


    /**
     * @desc This function sets session for the user 
     * @param Array usersdata 
     * @return Void 
     */
    public static function setSession($data = []){
      extract($data);
      $_SESSION["customer_id"] = $id;
      $_SESSION["customer_username"] = $username;
      $_SESSION["customer_email"] = $email;
    }

    /**
     * @desc This function sets cookie for the user 
     * @param Array usersdata 
     * @return Void 
     */
    public static function setCookie($data = []){
      extract($data);
      $userArray = json_encode(["email"=>$email,"id"=>$id,"username"=>$username]);
      // cookie lasts for one week
      setcookie("userdata",$userArray,time()+60*60*24*30,"/");

    }
}
