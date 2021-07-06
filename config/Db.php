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
  protected static function getDb(){
     if(empty(self::$connection)){
      self::$connection = new mysqli(self::$server_name,self::$db_user,self::$db_password,self::$db_name);
     }
     return self::$connection;
  }

  /**
   * @desc This method handles any type of insertion in our app
   * @param string sql query
   * @return Boolean true/false
   */
  protected static function insert($sql,$isLastId = false){
    $result = self::getDb()->query($sql);
    if($result){
      $result = ($isLastId) ? ["status"=>true,"id"=>self::getDb()->insert_id] : true;
    }else{
      $result = ($isLastId) ? ["status"=>false,"id"=>null] : false;
    }
    return $result;
  }

  /**
   * @Desc This function fetches a single row from the database ... not minding any table
   * @param string sqlquery
   * @return Array data fetched
   */
  protected static function fetchOne($sql): array
  {
    $result = self::getDb()->query($sql);
    if($result->num_rows > 0){
      return $result->fetch_assoc();
    }else{
      return [];
    }
  }


}