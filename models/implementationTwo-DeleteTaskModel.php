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
     * Function to delete a task
     * @param type $task_id The id of the task to delete
     * @return type Returning the result of the query
     */
    function user_delete_task ( $task_id )
    {
        $delete_query = "delete from system_tasks where task_id='$task_id'";
        return $this->query ( $delete_query );
    }//end of admin_delete_task ( $task_id )
    



    