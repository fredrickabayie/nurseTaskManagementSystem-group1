<?php
/**
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

        case 4:
            editTask();
            break;

        default:
            echo '{"result":0,status:"unknown command"}';
            break;
    }

}



/**
 * Function to update/edit a task
 *
 * This function gets the updated task details from the url
 * parsed by the controller javascript function using the post
 * method and creates an instance of
 */
function editTask ( )
{
    if ( isset ( $_REQUEST [ 'update_task_id' ] ) && isset ( $_REQUEST [ 'update_task_description' ] )
        && isset ( $_REQUEST [ 'update_task_title' ] ) && isset ( $_REQUEST [ 'update_task_title' ] )
        && isset ( $_REQUEST [ 'task_start_date' ] ) && isset ( $_REQUEST [ 'task_end_date' ] ) )
    {
        include '../models/UpdateTask.php';

        $task_title = $_REQUEST [ 'update_task_title' ];
        $task_description = $_REQUEST [ 'update_task_description' ];
        $task_id = $_REQUEST [ 'update_task_id' ];
        $task_collaborator = $_REQUEST['task_collaborator'];
        $task_start_date = $_REQUEST ['task_start_date'];
        $task_end_date = $_REQUEST ['task_end_date'];

        $obj = new UpdateTask();

        if ( $obj->editTask ( $task_id, $task_title, $task_description, $task_collaborator,
            $task_start_date, $task_end_date ) )
        {
            echo ' { "result":1, "status": "Successfully updated task" } ';
        }
        else
        {
            echo ' { "result":0, "status": "Failed to update task" }';
        }
    }
}