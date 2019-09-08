<!DOCTYPE html>


<?php
require_once "partials/head.php";
?>

<script type="text/javascript" src="library/js/callbyscroll.js"></script>

</head>

<body id="body" class="body call-no" data-page="mainsite">

<!-- begin header -->
<div id="header" class="header">
    <div class="header_wrapper">

	<?php
	require_once "partials/sites.php";
	?>

	<?php
	require_once "partials/nav.php";
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
				<div class="quote slideExpandUp">A Creative Initiative</div>
<!--				<div class="nav_tiles">-->
<!--                    <a href="../gallery.php">-->
<!--						<div class="tile tile2">Gallery</div>-->
<!--                    </a>-->
<!--                    <a href="../food.php">-->
<!--						<div class="tile tile3">Food</div>-->
<!--					</a>-->
<!--				</div>-->
			</div>
		</div>
	</div>
	<div id="about" class="page" data-page="about">
		<div class="page_wrapper">
			<div class="page_content">
				<div class="page_left">
					<?php
					    //require_once "plugins/photoslider.php";
					?>
                    <div class="content">
                        <span>
                            <p>I am currently working at eDealer developing websites for automotive dealerships across Canada.</p>
                            <p>I use CSS, JS, PHP in Wordpress every day and I've been developing my skills with frameworks
                             like React and Vue as they can save on hours of coding and templating.</p>
                            <p>I have a passion for design and creating applications. Object Oriented programing is my
                                favourite aspect in programming, which brings me to my hobby project -
                             a top down game in Java using mainly Canvas that I'm working on in my free time.</p>
                        </span>
                        <span><p>- Jesse Scott</p></span>
                    </div>
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
                <hr />
				<div class="portfolio_block" data-project-type="restaurants">
                    <div class="description">
                        <h3>Restaurant Websites</h3>
                        <p>Working at YP Dine / Dine.TO gave me the opportunity to create hundreds of websites for Restaurants across Canada. Here are a few of my favourite websites I designed and built using the CMS platform SingleApp.
                        </p>
                    </div>
					<div class="item item1">
						<a href="http://www.mrgreek.com/" target="_blank">
							<div class="image" style="background-image: url(library/images/portfolio/mrgreek.png)">
								<image src="library/images/portfolio/mrgreek.png" alt="Mr. Greek"/>
							</div>
						</a>
					</div>
					<div class="item item2">
						<a href="http://www.goodfellaspizza.ca/" target="_blank">
							<div class="image" style="background-image: url(library/images/portfolio/goodfellas.png)">
								<image src="library/images/portfolio/goodfellas.png" alt="Goodfellas Pizza"/>
							</div>
						</a>
					</div>
					<div class="item item3">
						<a href="http://www.capraskitchen.com/" target="_blank">
							<div class="image" style="background-image: url(library/images/portfolio/capras.png)">
								<image src="library/images/portfolio/capras.png" alt="Capra's Kitchen"/>
							</div>
						</a>
					</div>
					<div class="item item4">
						<a href="http://www.pukka.ca/" target="_blank">
							<div class="image" style="background-image: url(library/images/portfolio/pukka.png)">
								<image src="library/images/portfolio/pukka.png" alt="Pukka"/>
							</div>
						</a>					
					</div>
					<div class="item item5">
						<a href="http://www.cucci.ca/" target="_blank">
							<div class="image" style="background-image: url(library/images/portfolio/cucci.png)">
								<image src="library/images/portfolio/cucci.png" alt="Cucci Ristorante"/>
							</div>
						</a>					
					</div>
				</div>

                <div class="portfolio_block" data-project-type="personal">
                    <div class="description">
                        <h3>Personal Projects</h3>
                        <p>Working at YP Dine / Dine.TO gave me the opportunity to create hundreds of websites for Restaurants across Canada. Here are a few of my favourite websites I designed and built using the CMS platform SingleApp.
                        </p>
                    </div>
                    <div class="item item1">
                        <a href="cards.php">
                            <div class="text">
                                <p><strong>President Card Game</strong></p>
                                <p>For 2 players to pass to play against each other passing back between turn screens.</p>
                                <p>Not finished with some bugs!</p>
                            </div>
                            <div class="image">
                                <image src="library/images/president/spade.png" alt="President"/>
                            </div>
                        </a>
                    </div>
                    <div class="item item1">
                        <a href="food.php">
                            <div class="text">
                                <p><strong>Recipe Database</strong></p>
                                <p>Some of my favourite recipes sorted with photos to easily spark the memory of cooking each dish</p>
                                <p>Not finished with some bugs</p>
                            </div>
                            <div class="image">
                                <image src="library/images/tile-food.png" alt="Recipes"/>
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
require_once "partials/footer.php";
?>

<?php
require_once "partials/scripts.php";
?>


</body>
</html>