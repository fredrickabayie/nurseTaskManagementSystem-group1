<?php
/**
 * @author Mohammed Dahir Abdulmumini
 * 18/12/2015
 */
if ( isset ( $_REQUEST [ 'cmd' ] ) )
{
    $cmd = $_REQUEST[ 'cmd' ];
    
    switch ( $cmd )
    {   
        case 6:
            search_task ( );
            break;
        
        c
        default:
            echo '{"result":0,status:"unknown command"}';
            break;
    }//end of switch
    
}//end of if


/**
 * Function for user to search created tasks
 */
function search_created_tasks ( )
{
     if ( isset ( $_REQUEST [ 'search_text' ] ) )
    {
        include '../models/implementationThree-SearchCreatedTaskModel.php';
        
        $search_text = $_REQUEST [ 'search_text' ];
        session_start();
        $user_id = $_SESSION['user_id'];
        
        $obj = new User ( );
        
        if ( $obj->user_search_created_task ( $search_text, $user_id ) )
        {
            $row = $obj->fetch ( );
            echo '{"result":1, "tasks": [';
            while ( $row )
            {
                echo json_encode ( $row );
                $row = $obj->fetch ( );
                if ( $row )   {
                        echo ',';
                }
            }
                echo ']}';
        }   else
        {
            echo '{"result":0,"status": "An error occured for select product."}';
        }
    }
}//end of search_created_tasks()
