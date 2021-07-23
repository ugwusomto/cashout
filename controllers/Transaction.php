<?php 



class Transaction extends Db
{
    private static $tableName = "transactions";




    /**
     * @DESC This function inserts  transaction records for the user
     * @param string sql
     * @return Boolean
     */
    public static function create($sql)
    {
        $result = self::insertInto($sql);
        return $result;
    }



        /**
     * @desc This function handles  gets transaction reecord by the id
     * @param Array $data
     * @return Array user accout
     */
    public static function getDataByTxId($txid)
    {
        $user_id = $_SESSION["customer_id"];
        $sql = "SELECT * FROM ".self::$tableName." WHERE `tx_id`='$tx_id'";
        $result = self::fetchOne($sql);
        return $result;
    }

            /**
     * @desc This function returns all transaction by type detail 
     * @param Array $data
     * @return Array user bank detail
     */
    public static function getAllDataByType($type)
    {
        $user_id = $_SESSION["customer_id"];
        $sql = "SELECT * FROM ".self::$tableName." WHERE `type`='$type' AND `user_id`='$user_id' ";
        $result = self::fetchAll($sql);
        return $result;
    }

    
}
