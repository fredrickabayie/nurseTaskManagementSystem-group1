<?php

if ( isset ( $_REQUEST [ 'cmd' ] ) )
{
    $cmd = $_REQUEST[ 'cmd' ];
    
    switch ( $cmd )
    {
    	 case 1:
            task_preview ( );
            break;

        default:
            echo '{"result":0,status:"unknown command"}';
            break;
    }//end of switch
    
}//end of if

/**
 * Function to get preview of a task
 */
function task_preview ( )
{
    if ( isset ( $_REQUEST [ 'task_id' ] ) )
    { 
        include '../models/implementationTwo-TaskDetailsModel.php';
        
        $task_id = $_REQUEST [ 'task_id' ];
        
        $obj=new User ( );         
        if ( $obj->user_preview_task ( $task_id ) )
        {
            while ( $row = $obj->fetch ( ) )
            {
//                echo json_encode ( $row );
                echo '{"result":1, "task_title":"' .$row['task_title'].'",'
                        . '"task_id":"' .$row['task_id'].'",'
                       . '"user_fname":"' .$row['user_fname'].'",'
                        . '"user_sname":"' .$row['user_sname'].'",'
                        . '"user_picture":"' .$row['path'].'",'
                         . '"task_collaborator":"' .$row['task_collaborator'].'",'
                         . '"task_start_date":"' .$row['task_start_date'].'",'
                         . '"task_end_date":"' .$row['task_end_date'].'",'
                         . '"task_status":"' .$row['task_status'].'",'
                       . '"task_description":"' .$row['task_description'].'"}';
            }
        }
        else
        {
            echo '{"result":0, "status":"Failed to load the preview"}';
        }
    }
}//end of task_preview()
