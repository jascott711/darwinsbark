<!DOCTYPE html>


<?php
include "php/head.php";
?>

<script type="text/javascript" src="js/callbyscroll.js"></script>

</head>

<body id="body" class="body call-no" data-page="mainsite">

<!-- begin header -->
<div id="header" class="header">
    <div class="header_wrapper">

	<?php
	include "php/sites.php";
	?>

	<?php
	include "php/nav.php";
	?>

    </div>
</div>
<!-- end header -->

<!-- begin content -->

<div id="content" class="content">
	<div id="home" class="page" data-page="home">
		<div class="page_wrapper">
			<div class="page_content">
				<div class="name">
					<div class="word w1">d</div>
					<div class="word w2">&nbsp;|&nbsp;</div>
					<div class="word w3">b</div>
				</div>	
				<div class="quote">A Creative Initiative</div>
				<div class="nav_tiles">
                    <a href="../gallery.php">
						<div class="tile tile2">Gallery</div>
                    </a>
                    <a href="../food.php">
						<div class="tile tile3">Food</div>
					</a>
				</div>
			</div>
		</div>
	</div>
	<div id="about" class="page" data-page="about">
		<div class="page_wrapper">
			<div class="page_content">
				<div class="page_left">
					<?php
					include "php/gallery.php";
					?>
				</div>
				<div class="page_right">
					<div class="profile_img">
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="work" class="page" data-page="work">
		<div class="page_wrapper">
			<div class="page_content">	
				<h2>Portfolio</h2>
				<div class="description">
					<p>Working at YP Dine / Dine.TO gave me the opportunity to create hundreds of websites for Restaurants across the country. Here are a few of my favourite websites I designed and built using the CMS platform SingleApp.
					</p>
				</div>
				<div class="portfolio_block">
					<div class="item item1">
						<a href="http://www.mrgreek.com/" target="_blank">
							<div class="image" style="background-image: url(images/portfolio/mrgreek.png)">
								<image src="images/portfolio/mrgreek.png" alt="Mr. Greek"/>
							</div>
						</a>
					</div>
					<div class="item item2">
						<a href="http://www.spoonandfork.ca/" target="_blank">
							<div class="image" style="background-image: url(images/portfolio/sf.png)">
								<image src="images/portfolio/sf.png" alt="Spoon & Fork"/>
							</div>
						</a>
					</div>
					<div class="item item3">
						<a href="http://www.goodfellaspizza.ca/" target="_blank">
							<div class="image" style="background-image: url(images/portfolio/goodfellas.png)">
								<image src="images/portfolio/goodfellas.png" alt="Goodfellas Pizza"/>
							</div>
						</a>
					</div>
					<div class="item item4">
						<a href="http://www.capraskitchen.com/" target="_blank">
							<div class="image" style="background-image: url(images/portfolio/capras.png)">
								<image src="images/portfolio/capras.png" alt="Capra's Kitchen"/>
							</div>
						</a>
					</div>
					<div class="item item5">
						<a href="http://www.qmpizza.com/" target="_blank">
							<div class="image" style="background-image: url(images/portfolio/qmp.png)">
								<image src="images/portfolio/qmp.png" alt="Queen Margherita Pizza"/>
							</div>
						</a>					
					</div>
					<div class="item item6">
						<a href="http://www.pukka.ca/" target="_blank">
							<div class="image" style="background-image: url(images/portfolio/pukka.png)">
								<image src="images/portfolio/pukka.png" alt="Pukka"/>
							</div>
						</a>					
					</div>
					<div class="item item7">
						<a href="http://www.pizzeriaviamercanti.ca/" target="_blank">
							<div class="image" style="background-image: url(images/portfolio/viamercanti.png)">
								<image src="images/portfolio/viamercanti.png" alt="Via Mercanti"/>
							</div>
						</a>					
					</div>
					<div class="item item8">
						<a href="http://www.cucci.ca/" target="_blank">
							<div class="image" style="background-image: url(images/portfolio/cucci.png)">
								<image src="images/portfolio/cucci.png" alt="Cucci Ristorante"/>
							</div>
						</a>					
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- end page content -->

<?php
include "php/footer.php";
?>

</body>
</html>