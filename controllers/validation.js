


var Validation = function() {
    this.validate_title = function ( )
    {
//        Initializing instance variables
        var title;
        var title_value;
                
        title = new RegExp ( "[a-z]{2}" );
                        	
        title_value = document.getElementById ( "task_title" ).value;
       
        if ( !title.test ( title_value ) )
        {
             document.getElementById ( "task_title" ).style.border="1px solid red";
             return false;
        }
        else
        {
            document.getElementById ( "task_title" ).style.border="1px solid black";           
            return true;
        }        
    };
    
     this.validate_description = function ( )
    {
//        Instance variables
        var description;
        var description_value;
        
        description = new RegExp ( "[a-z]{2}");
        description_value = document.getElementById ( "task_description" ).value;
        
        if ( !description.test ( description_value ) )
        {
             document.getElementById ( "task_description" ).style.border="1px solid red";
             return false;
        }
        else
        {
            document.getElementById ( "task_description" ).style.border="1px solid black";
            return true;
        }
    };

    //noinspection JSUnusedGlobalSymbols,JSUnusedGlobalSymbols


this.validate_end_date = function () {
//        Instance variables
        var start_date;
        var start_date_value;
        
        start_date = new RegExp ( "[a-z]{10}");
        start_date_value = document.getElementById ( "task_start_date" ).value;
        
        if ( !start_date.test ( start_date_value ) )
        {
             document.getElementById ( "task_start_date" ).style.border="1px solid red";
             return false;
        }
        else
        {
            document.getElementById ( "task_start_date" ).style.border="1px solid black";
            return true;
        }
    };
    

        
};