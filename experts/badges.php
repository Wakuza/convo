<?php
    $page_title = "Badge System";
    $title = "Convo Portal | Badge System";
    include("./../core/init.php");
    protect_page();
    include("../assets/inc/header.inc.php");
?>

<div id="pop1" class="popbox">
    <h2>Success!</h2>
    <p>This is an example popbox.</p>
</div>
<div id="pop2" class="popbox">
    <h2>Danger!</h2>
    <p>Don't let this popbox go off the screen!</p>
</div>
 
 
 
<a href="#" class="popper" data-popbox="pop1">Hover here</a> to see how it works.  You can also hover <a href="#" class="popper" data-popbox="pop2">here</a> to see a different example.


<script>
$(function() {
    var moveLeft = 0;
    var moveDown = 0;
    $('a.popper').hover(function(e) {
   
        var target = '#' + ($(this).attr('data-popbox'));
         
        $(target).show();
        moveLeft = $(this).outerWidth();
        moveDown = ($(target).outerHeight() / 2);
    }, function() {
        var target = '#' + ($(this).attr('data-popbox'));
        $(target).hide();
    });
 
    $('a.popper').mousemove(function(e) {
        var target = '#' + ($(this).attr('data-popbox'));
         
        leftD = e.pageX + parseInt(moveLeft);
        maxRight = leftD + $(target).outerWidth();
        windowLeft = $(window).width() - 40;
        windowRight = 0;
        maxLeft = e.pageX - (parseInt(moveLeft) + $(target).outerWidth() + 20);
         
        if(maxRight > windowLeft && maxLeft > windowRight)
        {
            leftD = maxLeft;
        }
     
        topD = e.pageY - parseInt(moveDown);
        maxBottom = parseInt(e.pageY + parseInt(moveDown) + 20);
        windowBottom = parseInt(parseInt($(document).scrollTop()) + parseInt($(window).height()));
        maxTop = topD;
        windowTop = parseInt($(document).scrollTop());
        if(maxBottom > windowBottom)
        {
            topD = windowBottom - $(target).outerHeight() - 20;
        } else if(maxTop < windowTop){
            topD = windowTop + 20;
        }
     
        $(target).css('top', topD).css('left', leftD);
     
     
    });
 
});
</script>>

            <h1 class="headerPages">Badges System</h1>
            <div class="center_img">
                <img class="badges" src="images/Badges%20Diagram.png" alt="Badges Diagram"/>
            </div>

<?php
    include("./../assets/inc/footer.inc.php");
?>