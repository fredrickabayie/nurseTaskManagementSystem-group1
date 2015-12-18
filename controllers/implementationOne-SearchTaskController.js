//        function to search for a task
        $( function ( )
        {
            $(".showcontenttopsearchfield").keyup ( function ( )
            {
                $search_text = $ ( ".showcontenttopsearchfield" ).val ( );
                console.log ( $search_text );
                var url = "../controllers/implementationOne-SearchTaskController.php?cmd=6&search_text="+$search_text;
                var obj = sendRequest ( url );

                if ( obj.result === 1 )
                {
                    var div = "";
//                    var timer;
                    for ( var index in obj.tasks )
                    {
                        div += "<div class='showcontentdetailsinnertile showcontentdetailsinnertile2'\n\
                                    onclick='getPreview ( "+ obj.tasks [index].task_id+" )'>";  
                        div += "<input class='showcontentdetailsinnertilecheckbox showcontentdetailsinnertilecheckbox2'\n\
                                    value="+ obj.tasks [index].task_id+" name=todelete[] type='checkbox'>";
                        div += "<div class='showcontentdetailsinnertilename'>";
                        div += "<span>"+obj.tasks [index].user_fname+"&nbsp"+obj.tasks [index].user_sname+"</span>";
                        div += "<div class='showcontentdetailsinnertiledelete showcontentdetailsinnertiledelete2' \n\
                                    style='float:right; margin-right:10px'>";
                        div += "<a class='delete' style='padding: 7px' id="+ obj.tasks [index].task_id+"><i id='deleteicon' \n\
                                    class='fa fa-trash-o'></i></a>";
                        div += "</div>";
                        div += "</div>";
                        div += "<div class='showcontentdetailsinnertiletitle'>\n\
                                    <span>"+obj.tasks [index].task_title+"</span></div>";
                        div += "<div class='showcontentdetailsinnertiledescription'>\n\
                                    <span>"+obj.tasks [index].task_description+"</span></div>";
                        div += "</div>";
                    }
                    $ ( ".showcontentdetailsinnertile" ).slideDown ( 'slow' );
                    $ ( ".showcontentdetailsinner" ).html ( div );

//                     $ ( "#divStatus" ).text ( "Found " + obj.products.length + " results" );
                }
                else
                {
//                        $ ( "#divStatus" ).text ( obj.message );
//                        $ ( "#divStatus" ).css ( "backgroundColor", "red" );
                }
            });
        });

        //function to show the search field
        $( function ( )
        {
            $("#searchicon").click( function ( )
            {
                $(".showcontenttopsearchfield").fadeIn("slow").show( );
                $("#searchicon").attr("class","fa fa-close").fadeIn();
//                $("#searchicon").attr("id","closeicon");
            });
        });

