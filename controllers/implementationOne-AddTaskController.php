<?php
/*This the Controller Class
* It  Contains all the function used for the implementation of the add task functionality.
*
*/
/**
*@author Julateh Mulbah
*It also Includes the Model.php Class
*/

if ( isset ( $_REQUEST [ 'cmd' ] ) )
{
    $cmd = $_REQUEST[ 'cmd' ];
    
    switch ( $cmd )
    {
        
        case 3:
            add_task ( );
            break;
        
        
         
        default:
            echo '{"result":0,status:"unknown command"}';
            break;
    }//end of switch
    
}//end of if


/**
 * Function to add a new task
 */
function add_task ( )
{
    if ( isset ( $_REQUEST [ 'task_title' ] ) && isset ( $_REQUEST [ 'task_description' ] ) 
            && isset ( $_REQUEST [ 'user_id' ] ) && isset ( $_REQUEST [ 'task_collaborator' ] )
            && isset ( $_REQUEST [ 'task_start_date' ] ) && isset ( $_REQUEST [ 'task_end_date' ] ) )
    {
        include '../models/user_class.php';

        $task_title = $_REQUEST [ 'task_title' ];
        $task_description = $_REQUEST [ 'task_description' ];
        $user_id = $_REQUEST [ 'user_id' ];
        $task_collaborator = $_REQUEST ['task_collaborator'];
        $task_start_date = $_REQUEST ['task_start_date'];
        $task_end_date = $_REQUEST ['task_end_date'];

        $obj = new User ( );

        if ( $obj->user_add_new_task ( $task_title, $task_description, $user_id, $task_collaborator,
                $task_start_date, $task_end_date ) )
        {
            echo ' { "result":1, "status": "Successfully added a new task to the database" } ';
        }
        else
        {
             echo ' { "result":0, "status": "Failed to add a new task to the database" }';
        }
    }
}//end of add_task ( )