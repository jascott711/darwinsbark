$(document).ready(function(){
    //Call by Scroll
	var thisWindow = $(window);
	var thisContent = $('.content');
	var thisPage = $('.page');

	var thisContentHeight;
	var thisPageHeight = thisPage.height();

	var b = document.getElementById('body');
	var thisBody = $('body');

	thisWindow.scroll(function()  {
		var windowScroll = thisWindow.scrollTop();

		if (windowScroll < thisPageHeight && !((windowScroll >= (thisPageHeight / 2)))){ 
			if (!thisBody.hasClass("call-no")) {
				//thisBody.className += " call-no";
				thisBody.addClass("call-no");
			}
		}
		if (windowScroll >= (thisPageHeight / 2)) {
			b.className = "body call-no-end";
		}
		if (windowScroll >= thisPageHeight - 50){ 
			b.className = "body call1";
		}

		if (windowScroll >= (thisPageHeight * 2))	{ 
			b.className = "body call2"; 
		} 

	});

	thisWindow.resize(function(){
	  thisContentHeight = thisContent.outerHeight();     
	});     
});

