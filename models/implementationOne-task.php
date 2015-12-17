<?php
	include_once ( "adb.php" );
class task extends adb
{	
	/**
	* Constructor for task
	**/
	function task (){}
	
	/**
	* A function to get the tasks for a particular nurse given her id
	**/
    
    
    function getTasksForNurse($nurseid){
        $select_query = "select task_id, task_description, task_title, user_fname, user_sname,
                                task_start_date, task_end_date
                                from system_tasks
                                join system_users
                                on system_tasks.user_id=system_users.user_id 
                                and system_tasks.task_collaborator='$nurseid'
                                order by task_id desc";
        return $this->query( $select_query );
    }

}

?>