<?php
    include_once 'ntdb.php';
/**
 * Nurse Class
 *
 * The Nurse class contains various functions 
 *
 * @author     David Tandoh 
 * @version    1.0
 */
class nurse extends ntdb
{	
    
	/**
	* Constructor for nurse
	**/
	function nurse(){}
	
    
    /**
    *A function to retrieve the details of all nurses.
    **/
    function select_all_nurses()
    {
        $select_query = "select user_id ,user_fname, user_sname, age, sex, department from system_users ";
        return $this->query($select_query);
    }

    
}
?>