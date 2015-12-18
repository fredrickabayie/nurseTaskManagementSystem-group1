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

        case 12:
            archiveTask();
            break;

        default:
            echo '{"result":0,status:"unknown command"}';
            break;
    }

}


/**
 * Function to archive a task
 *
 * This function archives the task by identification number and
 * returns a json to the javascript response
 */
function archiveTask ( )
{
    if ( isset ( $_REQUEST [ 'archive_task_id' ] ) && isset ( $_REQUEST [ 'archive_task_status' ] ))
    {
        include '../models/ArchiveTask.php';

        $task_id = $_REQUEST [ 'archive_task_id' ];
        $task_status = $_REQUEST [ 'archive_task_status' ];


        $obj = new ArchiveTask();

        if ( $obj->archiveTasks ( $task_id, $task_status ) )
        {
            echo ' { "result":1, "status": "Successfully archived task" } ';
        }
        else
        {
            echo ' { "result":0, "status": "Failed to archive task" }';
        }
    }
}