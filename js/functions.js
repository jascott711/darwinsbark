

var isNavShown = true;
var isSubNavHomeShown = true;
var isSubNavSitesShown = true;

var bodyClass = $('.body');
var count = 0;


$(document).ready(function(){
  
  //Compact Header
  var thisWindow = $(window);
  var thisContent = $('.content');
  var thisHeader = $('.header');
  var thisContentHeight = thisContent.outerHeight();    
  var thisHeaderHeight = thisHeader.outerHeight();

  thisWindow.scroll(function(){
      var windowScroll = thisWindow.scrollTop();

      if (windowScroll >= thisHeaderHeight){ 
          thisHeader.addClass('compact'); 
      }
      else { 
          thisHeader.removeClass('compact'); 
      } 
  });

  thisWindow.resize(function(){
      thisContentHeight = thisContent.outerHeight();
  });     
 

  $('.link').click(function (event) {
    event.preventDefault();
    var l = $(this).attr('data-link');
    console.log('#'+l);


    $('#'+l).scrollView();
  });



  //Slick Gallery
  $('.slider-for').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    asNavFor: '.slider-nav',
    asNavFor2: '.slider-nav-mini'
  });
  $('.slider-nav').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    asNavFor: '.slider-for',
    dots: true,
    centerMode: true,
    focusOnSelect: true,
    asNavFor2: '.slider-nav-mini'
  });
});
	






$.fn.scrollView = function () {
  return this.each(function () {
    $('html, body').animate({
      scrollTop: $(this).offset().top
    }, 1000);
  });
}









function displayNav(){
	var d = document.getElementById('nav');
	
	if	(isNavShown)	{
		d.className = "nav expanded";
		isNavShown = false;
	}
	
	else if (!isNavShown)	{
		d.className = "nav";
		isNavShown = true;
	}
}




//Sites Header
var isDBsitesShown = true;
function displayDBsites(){
  var db = document.getElementById('nav_db_sites');
  
  if  (isDBsitesShown)  {
    db.className = "nav_db_sites expanded";
    
    isDBsitesShown = false;
  }
  
  else if (!isDBsitesShown) {
    db.className = "nav_db_sites";
    isDBsitesShown = true;
  }

}









$.fn.isOnScreen = function() {
    var viewport = {
        top: $thisWindow.scrollTop(),
        left: $thisWindow.scrollLeft()
    };
    viewport.right = viewport.left + $thisWindow.width();
    viewport.bottom = viewport.top + $thisWindow.height();
    var bounds = this.offset();
    bounds.right = bounds.left + this.outerWidth();
    bounds.bottom = bounds.top + this.outerHeight();
    return (!(viewport.right < bounds.left || viewport.left > bounds.right || viewport.bottom < bounds.top || viewport.top > bounds.bottom));
};













// Facebook
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

// Twitter
!function(d,s,id){
  var js,fjs=d.getElementsByTagName(s)[0],
  p=/^http:/.test(d.location)?'http':'https';
  if(!d.getElementById(id)) {
    js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';
    fjs.parentNode.insertBefore(js,fjs);
  }}(document, 'script', 'twitter-wjs');
