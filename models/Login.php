<?php
/**
 * Including others files into this document
 */
include_once ( 'adb.php' );


/**
 * Creating an instance of other class in the include files
 *
 * User: fredrickabayie
 * Date: 17/12/2015
 * Time: 21:44
 */
class Login extends adb
{

    /**
     * userLogin function
     *
     * This function is responsible for creating the login
     * query to query the database and allow a user to login
     * into the nurse task management system
     *
     * @param String $username The username of the user
     * @param String $password The password of the user
     * @return boolean The results of the query
     */
    function userLogin ( $username, $password )
    {
        $loginQuery = "SELECT *
                       FROM system_login
                       JOIN system_users
                       ON system_users.user_id=system_login.user_id
                       AND system_login.username='$username'
                       AND system_login.password=MD5('$password')
                       limit 1";

        if ( !$this->query ( $loginQuery ) )
        {
            return false;
        }
        else
        {
            return $this->fetch ( );
        }
    }
    
        
}