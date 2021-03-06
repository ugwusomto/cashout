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
   * @desc This method handles any type of update in our app
   * @param string sql query
   * @return Boolean true/false
   */
  protected static function update($sql){
    $result = self::getDb()->query($sql);
    if($result){
      return true;
    }else{
      return false;
    }
  }


     /**
   * @desc This method handles any type of insertion in our app
   * @param string sql query
   * @return Boolean true/false
   */
  protected static function insertInto($sql){
    $result = self::getDb()->query($sql);
    if($result){
      return true;
    }else{
      return false;
    }
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

    /**
   * @Desc This function fetches all row from the database that matches the query... not minding any table
   * @param string sqlquery
   * @return Array data fetched
   */
  protected static function fetchAll($sql): array
  {
    $result = self::getDb()->query($sql);
    if($result->num_rows > 0){
      $rows = [];
      while($data = $result->fetch_assoc()){
         $rows[] = $data;
      }
      return $rows;
    }else{
      return [];
    }
  }


}