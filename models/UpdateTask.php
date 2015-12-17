<?php


/**
 * Including others files into this document
 */
include_once ( 'adb.php' );

/**
 * Created by PhpStorm.
 * User: fredrickabayie
 * Date: 17/12/2015
 * Time: 21:44
 */

/**
 * Class UpdateTask
 *
 * This is class that handles updating/editing of task
 * by a nurse who created that particular task
 */
class UpdateTask extends adb
{

    /**
     * Function to update a task created by a nurse
     *
     * @param String $task_id The task identification number for the task to be edited
     * @param String $task_title The new title of the task
     * @param String $task_description The new description of the task
     * @param String $task_collaborator The new collaborators of the task
     * @param String $task_start_date The new start date of the task
     * @param String $task_end_date The new end date of the task
     * @return bool Returning the query results
     */
    function editTask ( $task_id, $task_title, $task_description,
                        $task_collaborator, $task_start_date, $task_end_date )
    {
        $updateQuery = "UPDATE system_tasks SET system_tasks.task_title='$task_title',
                        system_tasks.task_description='$task_description',
                        system_tasks.task_collaborator='$task_collaborator',
                        system_tasks.task_start_date='$task_start_date',
                        system_tasks.task_end_date='$task_end_date'
                        WHERE system_tasks.task_id='$task_id'";

        return $this->query ( $updateQuery );
    }

}