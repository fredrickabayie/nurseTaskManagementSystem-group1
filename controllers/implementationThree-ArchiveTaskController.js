/**
 * Created by fredrickabayie on 17/12/2015.
 */

//function to send an ajax request
function sendRequest ( u )
{
    var obj = $.ajax({url:u,async:false});
    var result=$.parseJSON(obj.responseText);
    return result;
}//end of sendRequest(u)


//function to add a new task
function archiveTask ( )
{
    var archive_task_id = document.getElementById("archive_task_id").value;
    var archive_task_status = document.getElementById("archive_task_status").value;

    var url = "implementationOne-UpdateTaskController.php?cmd=12&archive_task_status="+archive_task_status+
        "&archive_task_id="+archive_task_id;

    var obj = sendRequest ( url );

    if ( obj.status === 1)
    {
        $(".notifications").css("color", "darkgreen").text( obj.status );
    }
    else
    {
        $(".notifications").css("color", "red").text( obj.status );
        return false;
    }
}