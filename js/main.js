$("#drawerButton").click(
    function ()
    {
        if ($("#drawer:first").is(":hidden"))
        {
            $("#drawer").slideDown(800);
            setTimeout(function() {$("#drawerButton").text(":");}, 800);
        }
        else
        {
            $("#drawer").slideUp(800);
            setTimeout(function() {$("#drawerButton").text(";");}, 800);
        }
    });
    
!function(d,s,id)
{
    var js,fjs=d.getElementsByTagName(s)[0];
    if(!d.getElementById(id))
    {
        js=d.createElement(s);js.id=id;
        js.src="http://platform.twitter.com/widgets.js";
        fjs.parentNode.insertBefore(js,fjs);
    }
} (document,"script","twitter-wjs");