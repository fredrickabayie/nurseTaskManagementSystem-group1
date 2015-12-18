
                            //function to get description of task
            function getPreview ( id )
            {
                $(".previewprompttext").hide();
                $(".addtaskbutton").fadeOut().hide();
                $(".newtaskbutton").slideDown().show();
                $(".updatetaskbutton").slideDown().show();
                $(".edittaskbutton").slideDown().hide();
                var theUrl="../controllers/implementationTwo-TaskDetailsController.php?cmd=1&task_id="+id;
                var obj = sendRequest ( theUrl );		
                if ( obj )
                {
                     $(".preview").slideDown ( 'slow', function ( )
                    {
                       $ ( this ).show( );
                    });             

                    $(".showpreviewinnercontentheaderimage img").attr( "src", obj.user_picture );
                    $(".previewcontentheaderbodyname2").text( obj.user_fname +" "+ obj.user_sname );
                    $(".previewcontentheaderbodytitle2").text ( obj.task_title );
                    $(".previewcontentheaderbodydescription2").text ( obj.task_description );
                    $(".previewcontentheaderbodycollaborator2").text ( obj.task_collaborator );
                    $ ( ".showpreviewinner2upper").text ( obj.task_id );

                    console.log(obj.task_title);
                    console.log(obj.task_description);
                }
                else
                {
                    alert("failed to preview a task");
                }
                 $(".add").hide();
                 $(".update").hide();
            }