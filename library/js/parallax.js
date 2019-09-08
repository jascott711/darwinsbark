$(document).ready(function() {

    $thisWindow = $(window);
    var $allPages = $('.page');
    
    if ($thisWindow.width() > 900) {
        
        $thisWindow.scroll(function() {
            var windowScrollTop = $thisWindow.scrollTop();
        
            $allPages.each(function(index) {
                var $thisPage = $(this);
                var pageOffsetTop = $thisPage.offset().top;
                var scrollDiff = windowScrollTop - pageOffsetTop;
                var isOnScreen = $thisPage.isOnScreen() ? true : false;
                
                if (!isOnScreen) {
                    return true;
                }
                
                var bgPosY = -1 * (scrollDiff / 5);
                var bgPosition = '50% ' + bgPosY + 'px';
        
                $thisPage.css({
                    backgroundPosition: bgPosition    
                });
            
            });  

        });

    }

});
