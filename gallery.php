<!DOCTYPE html>


<?php
require_once "partials/head.php";
?>

<link rel="stylesheet" type="text/css" href="library/css/gallery.css" />

<script type="text/javascript" src="library/js/gallery.js"></script>
<script type="text/javascript" src="library/js/callbyscroll.js"></script>

<link rel="prefetch" href="library/images/gallery/puppy1.jpg">
<link rel="prefetch" href="library/images/gallery/puppy2.jpg">
<link rel="prefetch" href="library/images/gallery/puppy3.jpg">
<link rel="prefetch" href="library/images/gallery/puppy4.jpg">

</head>

<body id="body" class="body" data-page="mainsite">

<!-- begin header -->
<div id="header" class="header">
    <div class="header_wrapper">

    <?php
    require_once "partials/nav.php";
    ?>

    <?php
    require_once "partials/sites.php";
    ?>

    </div>
</div>
<!-- end header -->

<div id="header-mask" class="header-mask puppy1"></div>

<!-- begin content -->

<div class="image-reel" data-image-amount=(<?=$imageAmount;?>)>
	<div class="left-arrow"><i id="arrow-left" class="fa fa-arrow-circle-left" aria-hidden="true" ></i></div>
	<div class="right-arrow"><i id="arrow-right" class="fa fa-arrow-circle-right" aria-hidden="true" ></i></div>
</div>

<div id="container" class="container puppy1" >
	<div class="container_wrapper">
	</div>
</div>

<!-- end page content -->
<div id="footer-mask" class="footer-mask puppy1"></div>

<?php
require_once "partials/footer.php";
?>

<?php
require_once "partials/scripts.php";
?>


<script type="text/javascript">

<?php 
    $dir = 'library/images/gallery/';
    $scan = scandir($dir);
    $imageAmount = count($scan) - 2;
    
    $imageCount = 2; 
    $bgImage = $dir . $scan[$imageCount];
?>

document.addEventListener("keydown", function(e) {
    if (e.which == 37){
        imagePrev(<?=$imageAmount;?>);
    } 
    if (e.which == 39){
        imageNext(<?=$imageAmount;?>);
    }
});

document.getElementById("arrow-left").addEventListener("click", function(e) {
    imagePrev(<?=$imageAmount;?>);
});
document.getElementById("arrow-right").addEventListener("click", function(e) {
    imageNext(<?=$imageAmount;?>);
});


</script>

</body>
</html>