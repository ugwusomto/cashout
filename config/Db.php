<?php 

class Db{


  private static $db_name = "cashout";
  private static $db_user = "root";
  private static $db_password = "";
  private static $server_name = "localhost";

  private static $connection = null;

  /**
   * @Desc This method returns an instance of the database user
   */
  public static function getDb(){
     if(empty(self::$connection)){
      self::$connection = new mysqli(self::$server_name,self::$db_user,self::$db_password,self::$db_name);
     }
     return self::$connection;
  }


}