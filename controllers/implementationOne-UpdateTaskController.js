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
function editTask ( )
{
    var update_task_id = document.getElementById("update_task_id").value;
    var update_task_title = document.getElementById("update_task_title").value;
    var update_task_description = document.getElementById("update_task_description").value;


    var url = "../controllers/user_controller.php?cmd=4&update_task_title="+update_task_title+
        "&update_task_description="+update_task_description+"&update_task_id="+update_task_id;

    var obj = sendRequest ( url );

    if ( obj.status === 1)
    {
//                     $("#divStatus").text(obj.status);
    }
    else
    {
//                    $("#divStatus").text(obj.status);
//                    $("#divStatus").css("backgroundColor", "red");
        return false;
    }
}