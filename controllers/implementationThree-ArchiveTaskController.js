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


/**
 * Function to process the edit button
 * @returns {Boolean}
 */
$ ( function ( )
{
    $ ( ".updatetaskbutton" ).click ( function ( )
    {
        $(".addtaskbutton").fadeOut().hide();
        $(".newtaskbutton").slideDown().show();
        $(".edittaskbutton").slideDown().show();
        $(".updatetaskbutton").slideDown().hide();
        var task_id = $ ( ".showpreviewinner2upper" ).text();
        var task_title = $ ( ".previewcontentheaderbodytitle2" ).text();
        var task_description = $ ( ".previewcontentheaderbodydescription2" ).text();

        $(".update").slideDown ( 'slow', function ( )
        {
            $(this).show();
        });
        $(".preview").hide();
        $(".add").hide();

        $ ( "#update_task_id" ).attr( "value", task_id );
        $ ( "#update_task_title" ).attr( "value", task_title );
        $ ( "#update_task_description" ).html( task_description );
    });
});


//function to add a new task
function editTask ( )
{
    var update_task_id = document.getElementById("update_task_id").value;
    var update_task_title = document.getElementById("update_task_title").value;
    var update_task_description = document.getElementById("update_task_description").value;


    var url = "implementationOne-UpdateTaskController.php?cmd=4&update_task_title="+update_task_title+
        "&update_task_description="+update_task_description+"&update_task_id="+update_task_id;

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