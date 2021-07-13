<?php

class Account extends Db
{
    private static $tableName = "accounts";

    /**
     * @DESC This function creates an account record for the user
     * @param int userid
     * @return none
     */
    public static function create($user_id)
    {
        $sql = "INSERT INTO ".self::$tableName."(`user_id`) VALUES('$user_id')";
        $result = self::insert($sql);
    }


        /**
     * @DESC This function updates  account record for the user
     * @param string sql
     * @return Boolean
     */
    public static function updateRecord($sql)
    {
        $result = self::update($sql);
        return $result;
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


  /**
     * @desc This function handles  payment initialization
     * @param Array $data
     * @return Array payment data
     */
    public static function initializePayment($data = [])
    {

      try{

                extract($data);
        $url = "https://api.paystack.co/transaction/initialize";
        $fields = [
        'email' => $email,
        'amount' => ($amount * 100),
        "currency" => "NGN",
        "reference"=> Helper::generateTxRef(),
        "callback_url"=>$callback,
        "channels"=>["card"]
      ];

      // succ
        $fields_string = http_build_query($fields);
        //open connection
        $ch = curl_init();
  
        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
          "Authorization: Bearer $secretKey",
          "Cache-Control: no-cache",
        ));
  
        //So that curl_exec returns the contents of the cURL; rather than echoing it
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  
        //execute post
        $result = curl_exec($ch);
        return json_decode($result);

      }catch(Exception $e){
         return ["status"=>false,"message"=>"Something went wrong please try again"];
      }

    }
}
