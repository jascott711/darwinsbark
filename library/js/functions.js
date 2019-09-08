
// Page Variables
var thisWindow = $(window);
var thisBody = $('body');
var thisContent = $('.content');
var thisHeader = $('.header');
var thisPage = $('.page');
var isNavShown = true;
var isSubNavHomeShown = true;
var isSubNavSitesShown = true;
var count = 0;

$(document).ready(function(){
  
	// get bounds
	var thisContentHeight = thisContent.outerHeight();  
	var thisPageHeight = thisPage.height();  
	var thisHeaderHeight = thisHeader.outerHeight();

	
	thisWindow.scroll(function(){
		var windowScroll = thisWindow.scrollTop();

		if (windowScroll < thisPageHeight && !((windowScroll >= (thisPageHeight / 2)))){ 
			if (!thisBody.hasClass("call-no")) {
				thisBody.addClass("call-no");
			}
		}
		if (windowScroll >= (thisPageHeight / 2)) {
			if (!thisBody.hasClass("call-no-end")) {
				thisBody.addClass("call-no-end");
			}
		}
		if (windowScroll >= thisPageHeight - 50) {
			if (!thisBody.hasClass("call1")) {
				thisBody.addClass("call1");
			}
		}
		if (windowScroll >= (thisPageHeight * 2)) { 
			if (!thisBody.hasClass("call2")) {
				thisBody.addClass("call2");
			}
		} 

		// Compact Header
		//when scrolling add compact class
		if (windowScroll >= thisHeaderHeight){ 
			if (!thisHeader.hasClass("compact")) {
				thisHeader.addClass('compact');
			}
		}
		else {
			if (thisHeader.hasClass("compact")) {
				thisHeader.removeClass('compact'); 
			}
		} 

	});

	// get new bounds on resize
	thisWindow.resize(function(){
		thisContentHeight = thisContent.outerHeight();
	});  
	// emd Compact Header   


	//set nav link to scroll to section
	$('.link').on('click', function (event) {
		event.preventDefault();
		var l = $(this).attr('data-link');
		$('#'+l).each(function () {
            if ($(this).length) {
                var thisTop = $(this).offset().top;
                $('html, body').animate({
                    scrollTop: thisTop
                }, 500);
            }
        });
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
	

// Display Navigation Menu
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


// Sites Header
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


// Viewport Detection
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




// Analytics
// Facebook
(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6";
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

