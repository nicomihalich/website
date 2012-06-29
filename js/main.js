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

$(".title").fitText(0.8,{ minFontSize: '10px', maxFontSize: '90px' });
$("#drawerButton").fitText(1.2, { minFontSize: '10px', maxFontSize: '42px' });

var respond = function()
{
 var w = $('#drawer').innerWidth();
 
 if (w >= 735)
    fontsize = 18;
 else if (w >= 565)
    fontsize = 16;
 else
    fontsize = 12;
    
 $('#drawer').css('font-size', fontsize + 'px');
};


$(window).load(
    respond
    
);

$(window).resize(
    respond
    
);