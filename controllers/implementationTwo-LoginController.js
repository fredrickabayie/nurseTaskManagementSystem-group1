/**
 *Handling of user login details
 *
 * User: fredrickabayie
 * Date: 17/12/2015
 * Time: 21:41
 */

/**
 * Function to send the url
 *
 *This function sends a synchronous request in a url
 * format and parses the results obtained to a json format
 * @param url The url to send the request to
 */
function syncAjax ( url )
{
    var obj = $.ajax ({url: url, async: false});
    return $.parseJSON (obj.responseText);
}


/**
 * Function to get user details and send an ajax request
 */
$( function ( )
{
    $("#loginbutton").click( function ( )
    {
        var username = $("#username").val();
        var password = $("#password").val();

        var url = "../controllers/implementationTwo-LoginController.php?cmd=7&username="+username+"&password="+password;
        var obj = syncAjax ( url );

        if ( obj.result === 1 )
        {
            $("#loginstatus").text(obj.username);
            window.location.replace("home.php");
        }
        else
        {
            $("#loginstatus").text(obj.message);
        }
    });
});