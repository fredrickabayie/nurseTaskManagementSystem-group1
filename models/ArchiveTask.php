<?php
/**
 * Including others files into this document
 */
include_once ( 'adb.php' );


/**
 * Class ArchiveTask
 *
 * This is class that handles archiving a task
 *
 * User: fredrickabayie
 * Date: 17/12/2015
 * Time: 21:44
 */
class ArchiveTask extends adb
{


    /**
     * Function to run a query to archive a task
     *
     * @param String $task_id The task identification number of task to archive
     * @param String $task_archive Changing the task status
     * @return bool Returning the query results
     */
    function archiveTask ( $task_id, $task_archive )
    {
        $archiveQuery = "UPDATE system_tasks
                        SET system_tasks.task_archive='$task_archive',
                        WHERE system_tasks.task_id='$task_id'";

        return $this->query ( $archiveQuery );
    }

}