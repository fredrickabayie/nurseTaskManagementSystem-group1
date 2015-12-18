<?php
/**
 *Handling of user login details
 *
 * User: fredrickabayie
 * Date: 17/12/2015
 * Time: 21:41
 */

if ( isset ( $_REQUEST [ 'cmd' ] ) )
{
    $cmd = $_REQUEST[ 'cmd' ];

    switch ( $cmd )
    {

        case 7:
            user_login ( );
            break;

        default:
            echo '{"result":0,status:"unknown command"}';
            break;
    }

}



/**
 * Function to handle login
 *
 * This function is to handle login query by passing the user login
 * details to the login function in the login.php class
 * This function also converts the results to a json format
 * and passes it to the javascript function
 */
function user_login ( )
{
    if ( isset ( $_REQUEST['username'] ) & isset ( $_REQUEST['password'] ) )
    {
        include_once '../models/Login.php';
        $obj = new Login();
        $username = $_REQUEST ['username'];
        $password = $_REQUEST ['password'];
        $row = $obj->userLogin ( $username, $password );
        if ( !$row )
        {
            echo '{"result":0, "message":"Failed to login"}';
        }
        else
        {
            session_start ( );
            $user_type = $row['user_type'];
            if ( $user_type == 'admin' )
            {
                echo '{"result":1, "username":"'.$row['username'].'"}';
                $_SESSION ['user_type'] = $user_type;
                $_SESSION ['user_id'] = $row['user_id'];
            }
            else if ( $user_type == 'regular')
            {
                echo '{"result":1, "username":"'.$row['username'].'"}';
                $_SESSION ['user_type'] = $user_type;
                $_SESSION ['user_id'] = $row['user_id'];
                $_SESSION ['path'] = $row['path'];
                $_SESSION ['username'] = $row['username'];
            }
        }
    }
}