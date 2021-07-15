<?php



class Bank extends Db
{
    private static $tableName = "banks";




    /**
     * @DESC This function inserts  bank records for the user
     * @param string sql
     * @return Boolean
     */
    public static function create($sql)
    {
        $result = self::insertInto($sql);
        return $result;
    }


      /**
     * @desc This function handles  bank verification
     * @param Array $data
     * @return Array payment data
     */
    public static function verifyBank($data = [])
    {

      try{

        extract($data);
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.paystack.co/bank/resolve?account_number=$account_no&bank_code=$bank_code",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "Authorization: Bearer $secretKey",
            "Cache-Control: no-cache",
          ),
        ));

  
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        return json_decode($response);

      }catch(Exception $e){
         return ["status"=>false,"message"=>"Something went wrong please try again"];
      }

    }


        /**
     * @desc This function returns user back detail record
     * @param String $code
     * @param String $account_no
     * @return Array user accout
     */
    public static function getDataByCodeAndAccount($code,$account_no)
    {
        $user_id = $_SESSION["customer_id"];
        $sql = "SELECT * FROM ".self::$tableName." WHERE  `code`='$code' AND `account_no`='$account_no'";
        $result = self::fetchOne($sql);
        return $result;
    }



      /**
     * @desc This function returns user bank detail record
     * @param Integer  $id
     * @return Array user accout
     */
    public static function getDataById($id)
    {
        $user_id = $_SESSION["customer_id"];
        $sql = "SELECT * FROM ".self::$tableName." WHERE  `id`='$id'";
        $result = self::fetchOne($sql);
        return $result;
    }

        /**
     * @desc This function returns all user bank detail 
     * @param Array $data
     * @return Array user bank detail
     */
    public static function getAllData()
    {
        $user_id = $_SESSION["customer_id"];
        $sql = "SELECT * FROM ".self::$tableName." WHERE `user_id`='$user_id' ";
        $result = self::fetchAll($sql);
        return $result;
    }

    



}
