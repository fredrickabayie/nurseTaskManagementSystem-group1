<?php

/**
 * Including others files into this document
 *@author Julateh k. Mulbah
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
     * Function to add a new task
     * @param type $admin_id The user id of the admin
     * @return type Returning the result of the query
     */
    function user_add_new_task ( $task_title, $task_description, $user_id, $task_collaborator,
                                                    $task_start_date, $task_end_date )
    {
        $add_query = "insert into `system_tasks` ( `task_title`, `task_description`, `user_id`,"
                . " `task_collaborator`, `task_start_date`, `task_end_date` )"
                . "values ( '$task_title', '$task_description', '$user_id', '$task_collaborator', "
                . "'$task_start_date', '$task_end_date' )";
        return $this->query ( $add_query );        
    }//end of admin_add_new_task ( $user_id )
    
    
    
    