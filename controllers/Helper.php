<?php 

class Helper{

  /**
   * @desc This function sanitizes data 
   * @param String data
   * @return String data
   */
  public static function sanitize($data,$case = null): string
  {
    $data = trim($data);
    $data = htmlspecialchars($data);
    if($case == "lower"){
      $data = strtolower($data);
    }else if($case == "upper" ){
      $data = strtoupper($data);
    }
    return $data;
  }

  /**
   * @desc This function Helps encryt data 
   * @param String data
   * @return String encrypt data
   */
  public static function encrypt($data) :string
  {
    return sha1($data);
  }

  /**
   * @desc This function generates transaction ref
   */
  public static function generateTxRef(){
    return rand(100, 1000)."ABCD".rand(300, 5000);
  }

  /**
   * @this function helps us preview data
   */
  public static function see($data,$kill = false){
    echo "<pre>";
    print_r($data);
    if($kill){die();}
  }


}