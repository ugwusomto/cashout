<?php 

class Account extends Db{

    private static $tableName = "accounts";

    /**
     * @DESC This function creates an account record for the user
     * @param int userid
     * @return none
     */
    public  static function create($user_id){
      $sql = "INSERT INTO ".self::$tableName."(`user_id`) VALUES('$user_id')";
      $result = self::insert($sql);
    }


    /**
     * @desc This function handles  user account record
     * @param Array $data
     * @return Array user accout
     */
    public static function getData()
    {
      $user_id = $_SESSION["customer_id"];
      $sql = "SELECT * FROM ".self::$tableName." WHERE `user_id`='$user_id'";
      $result = self::fetchOne($sql);
      return $result;
    }



}