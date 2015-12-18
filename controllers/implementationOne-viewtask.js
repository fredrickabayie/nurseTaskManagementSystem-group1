function getTasks()
            {
                var nurseid = 1;
               var url = "../controllers/user_controller.php?cmd=1&nurseid="+nurseid;
               var obj = sendRequest (url);
               var path = "";
                if ( obj.result === 1 )
                {
                    $(".tasks2").hide();
                    $(".tasks").slideDown().show();
                    path = $(".path").val();
                    var div = "";
                    var timer;
                    for ( var index in obj.tasks )
                    {
                        div += "<div class='showcontentdetailsinnertile showcontentdetailsinnertile2'\n\
                                    onclick='getPreview ( "+obj.tasks[index].task_id+" )'>";
                        div += "<input class='showcontentdetailsinnertilecheckbox showcontentdetailsinnertilecheckbox2'\n\
                                    value="+obj.tasks[index].task_id+" name='todelete[]' type='checkbox'>";
                        div += "<div class='showcontentdetailsinnertilename'>";
                        div += "<span>"+obj.tasks[index].name+"</span>";
                        div += "<div class='showcontentdetailsinnertiledelete showcontentdetailsinnertiledelete2' \n\
                                    style='float:right; margin-right:10px'>";
                        div += "<a class='delete' style='padding: 7px' id="+obj.tasks [index].task_id+"><i id='deleteicon' \n\
                                    class='fa fa-trash-o'></i></a>";
                        div += "</div>";
                        div += "</div>";
                        div += "<div class='showcontentdetailsinnertiletitle'>\n\
                                    <span>"+obj.tasks [index].task_title+"</span></div>";
                        div += "<div class='showcontentdetailsinnertiledescription'>\n\
                                    <span>"+obj.tasks [index].task_description+"</span></div>";
                        div += "</div>";
                    }
                    $ ( ".showcontentdetailsinner" ).html ( div );
//                     $ ( "#divStatus" ).text ( "Found " + obj.products.length + " results" );
                }
                else
                {
//                        $ ( "#divStatus" ).text ( obj.message );
//                        $ ( "#divStatus" ).css ( "backgroundColor", "red" );
                }

                timer = setTimeout ( '', 1000 );
//            });
}

                //function to get description of task
            function getPreview ( id )
            {
                $(".previewprompttext").hide();
                $(".addtaskbutton").fadeOut().hide();
                $(".newtaskbutton").slideDown().show();
                $(".updatetaskbutton").slideDown().show();
                $(".edittaskbutton").slideDown().hide();
                var theUrl="../controllers/user_controller.php?cmd=1&task_id="+id;
                var obj = sendRequest ( theUrl );		
                if ( obj )
                {
                     $(".preview").slideDown ( 'slow', function ( )
                    {
                       $ ( this ).show( );
                    });             

                    $(".showpreviewinnercontentheaderimage img").attr( "src", obj.user_picture );
                    $(".previewcontentheaderbodyname2").html( obj.user_fname +" "+ obj.user_sname );
                    $(".previewcontentheaderbodytitle2").html ( obj.task_title );
                    $(".previewcontentheaderbodydescription2").html ( obj.task_description );
                    $(".previewcontentheaderbodycollaborator2").html ( obj.task_collaborator );
                    $ ( ".showpreviewinner2upper").html ( obj.task_id );
                    $(".previewcontentheaderbodydate2").html("Date start:&nbsp "+ obj.task_start_date );
                    $(".previewcontentheaderbodydate3").html("Date end:&nbsp "+ obj.task_end_date );
                    $(".previewcontentheaderbodystatus").html("Status:&nbsp " +obj.task_status );

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