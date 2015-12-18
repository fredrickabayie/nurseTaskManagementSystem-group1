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
     * Function to search for a task
     * @param type $search_text The text to be searched
     * @return type Returning the result obtained
     */
    function user_search_created_task ( $search_text, $user_id )
    {
        $search_query = "select task_id, task_description, task_title, user_fname, user_sname,
                                task_start_date, task_end_date
                                from system_tasks
                                join system_users
                                on system_tasks.user_id=system_users.user_id
                                and system_tasks.user_id = '$user_id'
                                and system_tasks.task_title like '%$search_text%'
                                order by task_id desc";
        return $this->query ( $search_query );
    }//end of admin_search_task()
    
    