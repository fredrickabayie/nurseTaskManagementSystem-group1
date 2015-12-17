<?php
/**
 * Created by PhpStorm.
 * User: fredrickabayie
 * Date: 17/12/2015
 * Time: 21:41
 */

if ( isset ( $_REQUEST [ 'cmd' ] ) )
{
    $cmd = $_REQUEST[ 'cmd' ];

    switch ( $cmd )
    {

        case 1:
            update_task ( );
            break;

        default:
            echo '{"result":0,status:"unknown command"}';
            break;
    }//end of switch

}//end of if



/**
 * Fucntion to update a task
 */
function update_task ( )
{
    if ( isset ( $_REQUEST [ 'update_task_id' ] ) && isset ( $_REQUEST [ 'update_task_description' ] )
        && isset ( $_REQUEST [ 'update_task_title' ] ) && isset ( $_REQUEST [ 'update_task_title' ] )
        && isset ( $_REQUEST [ 'task_start_date' ] ) && isset ( $_REQUEST [ 'task_end_date' ] ) )
    {
        include '../models/user_class.php';

        $task_title = $_REQUEST [ 'update_task_title' ];
        $task_description = $_REQUEST [ 'update_task_description' ];
        $task_id = $_REQUEST [ 'update_task_id' ];
        $task_collaborator = $_REQUEST['task_collaborator'];
        $task_start_date = $_REQUEST ['task_start_date'];
        $task_end_date = $_REQUEST ['task_end_date'];

        $obj = new User ( );

        if ( $obj->user_update_task ( $task_id, $task_title, $task_description, $task_collaborator,
            $task_start_date, $task_end_date ) )
        {
            echo ' { "result":1, "status": "Successfully updated task" } ';
        }
        else
        {
            echo ' { "result":0, "status": "Failed to update task" }';
        }
    }
}//end of update_task ( )