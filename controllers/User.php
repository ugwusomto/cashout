<?php

class User extends Db
{

  
  /**
   * @desc This function handles  user registration
   * @param Array $data
   * @return Boolean (true or False)
   */
    public static function register($data = [])
    {
        extract($data);
    }


    /**
     * @desc This function handles  user login
     * @param Array $data
     * @return Array user data
     */
    public static function login($data = [])
    {
        extract($data);
    }

    /**
   * @desc This function checks if email exists
   * @param String $email
   * @return Array user data
   */
    public static function emailExists($email)
    {
      return false;
    }

    /**
   * @desc This function checks if username exists
   * @param String $username
   * @return Boolean user data
   */
    public static function usernameExists($username)
    {
       return false;
    }
}
