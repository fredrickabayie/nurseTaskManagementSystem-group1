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

    	/**
	* A function to add a nurse to the database given the nurse's firstname, surname,
    age, sex and department
    *@param $fname firstname of nurse
    *@param $sname surname of nurse
    *@param $age age of nurse
    *@param $sex sex of nurse
    *@param $department department nurse belongs to 
	**/
	function add_nurse ($fname, $sname, $age, $sex, $department)
	{
		$insert_query = "insert into system_users set user_fname='$fname', user_sname='$sname', age='$age', sex= '$sex', department = '$department'";
		return $this->query ($insert_query);
	}     
}
    
}
?>