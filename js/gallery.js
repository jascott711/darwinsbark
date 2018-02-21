
// imageReel
var imageCount = 1;

function imageNext(imageAmount){
	var c = document.getElementById('container');
	var hm = document.getElementById('header-mask');
	var fm = document.getElementById('footer-mask');

	imageCount++;

	if (imageCount > imageAmount) {
		imageCount = 1;
	}

	c.className = "container puppy" + imageCount;
	hm.className = "header-mask puppy" + imageCount;
	fm.className = "footer-mask puppy" + imageCount;
}


function imagePrev(imageAmount){	
	var c = document.getElementById('container');
	var h = document.getElementById('header');
	var hm = document.getElementById('header-mask');
	var fm = document.getElementById('footer-mask');


	imageCount--;

	if (imageCount < 1) {
		imageCount = imageAmount;
	}
	
	c.className = "container puppy" + imageCount;
	hm.className = "header-mask puppy" + imageCount;
	fm.className = "footer-mask puppy" + imageCount;
}


// nav : Modification
function displayNav(){
	var b = document.getElementById('body');
	var d = document.getElementById('nav');
	var db = document.getElementById('nav_db_sites');
	
	if	(isNavShown)	{		
		b.className = "body expanded";
		d.className = "nav expanded";
		db.className = "nav_db_sites expanded";
		isNavShown = false;
	}
	
	else if (!isNavShown)	{
		b.className = "body";		
		d.className = "nav";
		db.className = "nav_db_sites";
		isNavShown = true;
	}
}
document.addEventListener("keydown", function(e) {
    if (e.which == 32){
    	displayNav();
    } 
});

var isDBsitesShown = true;
function displayDBsites(){
	var b = document.getElementById('body');
	var db = document.getElementById('nav_db_sites');

	if  (isDBsitesShown)  {
		b.className = "body expanded";
		db.className = "nav_db_sites expanded";

		isDBsitesShown = false;
	}

	else if (!isDBsitesShown) {
		b.className = "body";	
		db.className = "nav_db_sites";
		isDBsitesShown = true;
	}

}



