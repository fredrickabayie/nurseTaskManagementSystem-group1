/*
//function to call the add task
*This function call the add task its makes the page iteractive.
*/
            $ ( function ( )
            {
                $ ( ".newtaskbutton" ).click ( function ( )
                {
                    $(".add").slideDown ( 'slow', function ( )
                    {
                        $(".addtaskbutton").slideDown().show();
                        $(".newtaskbutton").slideDown().hide();
                         $(".updatetaskbutton").slideDown().show();
                         $(".edittaskbutton").slideDown().hide();
                        $(this).show();
                    });
                    $(".preview").hide();
                    $(".update").hide();
                });
            });
    /*
   //function to add a new task
   *This fuction takes the value from the texfied and insert it to the dat base.
   *
   */
        function insertTask ( )
        {
                var task_title = encodeURI(document.getElementById("task_title").value);
                var task_description = encodeURI(document.getElementById("task_description").value);
                var user_id = encodeURI(document.getElementById("user_id").value);
                var user_collaborator = document.getElementById ( "collaborator" );
                var task_collaborator = user_collaborator.options [ user_collaborator.selectedIndex ].value;

                var url = "../controllers/implementationOne_controller.php?cmd=3&task_title="+task_title+
                        "&task_description="+task_description+"&user_id="+user_id+
                        "&task_collaborator="+task_collaborator;

                var obj = sendRequest ( url );

                if ( obj.status === 1)
                {
                     $(".leftnavmenuinnernotificationinner").text( obj.status );
                }
                else
                {
//                    $("#divStatus").text(obj.status);
//                     $("#divStatus").css("backgroundColor", "red");
                    return false;                    
                }
        }//end of insertTask

