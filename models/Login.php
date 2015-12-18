<?php

/**
 * Including others files into this document
 */
include_once ( 'adb.php' );

/**
 * Creating an instance of other class in the include files
 */
class Login extends adb
{

    /**
     * Function to allow user login
     * @param String $username
     * @param String $password
     * @return boolean
     */
    function user_login ( $username, $password )
    {
        $login_query = "SELECT *
                        FROM system_login
                        JOIN system_users
                        ON system_users.user_id=system_login.user_id
                        AND system_login.username='$username'
                        AND system_login.password=MD5('$password')
                        limit 1";
        if ( !$this->query ( $login_query ) )
        {
            return false;
        }
        else
        {
            return $this->fetch ( );
        }
    }//end of add_new_task
    
        
}//end of class