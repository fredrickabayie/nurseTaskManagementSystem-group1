//            Function to load the list of task
            $ ( document ).ready ( function ( )
            {
               var url = "../controllers/implementaionOne-AddTaskcontroller.php?cmd=5";
               var obj = sendRequest ( url );
               var path = "";
                if ( obj.result === 1 )
                {
                    path = $(".path").val();
                    $("#profileimage").attr("src", path );
                    var div = "";
                    var timer;
                    for ( var index in obj.tasks )
                    {
                        div += "<div class='showcontentdetailsinnertile showcontentdetailsinnertile2'\n\
                                    onclick='getPreview ( "+obj.tasks [index].task_id+" )'>";
                        div += "<input class='showcontentdetailsinnertilecheckbox showcontentdetailsinnertilecheckbox2'\n\
                                    value="+obj.tasks [index].task_id+" name='todelete[]' type='checkbox'>";
                        div += "<div class='showcontentdetailsinnertilename'>";
                        div += "<span>"+obj.tasks [index].user_fname+" "+obj.tasks [index].user_sname+"</span>";
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

                timer = setTimeout ( '(this)', 1000 );
            });

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

                        //function to send an ajax request
            function sendRequest ( u )
           {
               var obj = $.ajax({url:u,async:false});
                var result=$.parseJSON(obj.responseText);
                return result;
           }//end of sendRequest(u)


           //function to remove a tile
           $(function ( )
           {
               $ ( ".delete" ).click ( function ( )
               {

                    var divContainer = $ ( this ).parents ( ".showcontentdetailsinnertile" );
                    var icondelete = $ ( this ).children ( "#deleteicon" );
                    var id = $ ( this ).attr ( "id" );  
                    console.log ( id );
                    var string = 'cmd=2&task_id='+ id ; 

                    $.ajax (
                            {
                //                type: "POST",
                                url: "../controllers/user_controller.php",
                                data: string,
                                cache: false,
                                success: function ( )
                                {
                                    icondelete.attr ( "class", "fa fa-spin fa-trash-o" );
                                    divContainer.slideUp ( 'slow', function ( ) 
                                    {
                                        $ ( this ).remove ( );
                                    } );
                                 }

                            });
                            return false;
                });
            });


//function to call the add task
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
