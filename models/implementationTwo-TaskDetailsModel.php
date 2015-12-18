<?php

/**
 * Including others files into this document
 */
include_once ( 'adb.php' );

/**
 * Creating an instance of other class in the include files
 */
class User extends adb
{
    
    /**
     * Constructor
     */
    function _construct ( )
    {
        $this->establish_connection ( );
    }//end of constructor
    
    /**
     * Destructor
     */
    function _destruct ( )
    {
        $this->close_connection ( );
    }//end of destructor

    /**
     * Function to preview a selected id
     * @param type $task_id The id of task to be previewed
     * @return type Returning the result of the query
     */
    function user_preview_task ( $task_id )
    {
        $preview_query = "select task_id, task_description, task_title, user_fname, user_sname, task_status,
                                    system_tasks.user_id, path, task_collaborator, task_start_date, task_end_date
                                    from system_tasks
                                    join system_users
                                    on system_users.user_id=system_tasks.user_id and system_tasks.task_id='$task_id'";
        return $this->query ( $preview_query );
    }//end of admin_preview_task ( $task_id )
    