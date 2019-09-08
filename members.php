<!DOCTYPE html>


<?php
require_once "partials/head.php";
?>

<link rel="stylesheet" type="text/css" href="library/css/members.css" />

<script type="text/javascript" src="library/js/tech.js"></script>
<script type="text/javascript" src="library/js/jquery.touchSwipe.js"></script>
<script type="text/javascript" src="library/js/jquery.touchSwipe.min.js"></script>

<link rel="prefetch" href="library/images/tech/speaker.jpg">
<link rel="prefetch" href="library/images/tech/usb.jpg">
<link rel="prefetch" href="library/images/tech/keyboard.jpg">
<link rel="prefetch" href="library/images/tech/cage.jpg">
<link rel="prefetch" href="library/images/tech/cables.jpg">

</head>


<body id="body" class="body page0" data-page="tech">


<!-- begin header -->
<div id="header" class="header">
    <div class="header_wrapper">

	<?php
	require_once "php/sites.php";
	?>

	<div class=></div>
	<div class="login">LOG IN</div>
	<div class="logout">LOG OUT</div>

    </div>
</div>
<!-- end header -->

<!-- begin content -->

<div id="mask" class="mask"></div>

<div id="content" class="content">
	<div class="page page1" >
		<div class="page_wrapper">
			<div class="page_content">
				<div class="name">
					<div class="word w1">d</div>
					<div class="word w2">&nbsp;|&nbsp;</div>
					<div class="word w3">b</div>
				</div>	




				<div class="stats">
					<div class="fbname"></div>
					<div class="fbemail"></div>
					<div class="fbfname"></div>
					<div class="fblname"></div>
					<div class="fbimg"></div>
				</div>




				<div id="result"></div>

			</div>
		</div>
	</div>	
</div>

<!-- end page content -->

<?php
require_once "php/footer.php";
?>

</body>
</html>