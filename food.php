<!DOCTYPE html>

<?php
include "php/head.php";
?>

<link rel="stylesheet" type="text/css" href="css/food.css" />

<script type="text/javascript" src="js/callbyscroll.js"></script>

</head>

<body id="body" class="body" data-page="food">

<!-- begin header -->
<div id="header" class="header">
    <div class="header_wrapper">

	<?php
	include "php/sites.php";
	?>

    </div>
</div>
<!-- end header -->

<!-- begin content -->
<div id="banner" class="banner">
	<div class="banner_wrapper">
		<div id="slideShowImages">
			<img src="css\images\food\banners\b1.jpg" alt="Slide 1" />
			<img src="css\images\food\banners\b2.jpg" alt="Slide 2" />
			<img src="css\images\food\banners\b3.jpg" alt="Slide 3" />    
		</div>  

	</div>
</div>

<div id="food-home" class="home food" data-page="php-recipes">
	<div id="content" class="content">
		<div class="content_wrapper">
			<div id="slideShowButtonCont">
				<div id="prevSlide" class="fa fa-backward"></div>
				<div id="slideShowButton" class="fa fa-pause"></div>
				<div id="nextSlide" class="fa fa-forward"></div>
			</div>
			<div class="recipe-page">
				<h1 class="title">Recipes</h1>
				
				<?php
				include "php/recipe-social.php";
				?>

				<div id="show-sorting" class="show-sorting" onclick="displaySorting()">
					<i class="fa fa-arrow-down" ><span>Display Sorting Options</span></i>
				</div>

				<div id="recipe-searchbar" class="recipe-sorting hide">
					<form id="recipe-search" action="data/session.php" method="post">
						<input type="text" id="search-text" name="search-bar" size="32" placeholder="enter search text here" required 
							value="<?php echo (isset($_POST['search-bar']) ? $_POST['search-bar'] : ''); ?>" /> 
						<input type="button" id="search-btn" name="search-btn" value="Search"/>
						<input type="reset" id="reset-btn" name="reset"  value="Reset" />
					</form>        
				</div>
				
				<div id="recipe-searchbar-results" class="recipe-sorting hide">
					<div class="text"></div>
				</div>
				
				<div id="recipe-sorter" class="recipe-sorting hide">
					<hr id="recipe-hr" class="recipe-sorting hide"/>
					<form id="recipe-radio">
						<div id="recipe-sorter-subtitle" class="">Sort Alphabetically:</div>
						<ul> 
							<li class="recipe-chkbx az-up">
								<input type="radio" name="recipes-sort" id="recipes-up" value="az-up" <?php echo (isset($_POST['recipes-sort']) ? 'checked' : ''); ?> />
								<label for="recipes-up">Sort <i class="fa fa-arrow-up" aria-hidden="true"></i></label>
							</li> 
							<li class="recipe-chkbx az-down">
								<input type="radio" name="recipes-sort" id="recipes-down" value="az-up" <?php echo (isset($_POST['recipes-sort']) ? 'checked' : ''); ?> />
								<label for="recipes-down">Sort <i class="fa fa-arrow-down" aria-hidden="true"></i></label>
							</li> 
							<li class="hr-break"><hr /></li>
						</ul>
						<div id="recipe-sorter-subtitle" class="">View All Recipes:</div>
						<ul>
							<li class="recipe-chkbx">
								<input type="radio" name="recipes-type" id="recipes1" value="all" checked />
								<label for="recipes1">All</label>
							</li> 
							<li class="recipe-chkbx">
								<input type="radio" name="recipes-type" id="recipes2" value="entrees" <?php echo (isset($_POST['recipes-type']) ? 'checked' : ''); ?> />
								<label for="recipes2">Entrées</label>
							</li> 
							<li class="recipe-chkbx">
								<input type="radio" name="recipes-type" id="recipes3" value="desserts" <?php echo (isset($_POST['recipes-type']) ? 'checked' : ''); ?> />
								<label for="recipes3">Desserts</label>
							</li> 
						</ul>
					</form>
					<hr id="recipe-hr" class="recipe-sorting hide"/>
				</div>
				<div class="recipe-list">
					<a class="recipe-tile-link raspberry-lime-mini-cheese-cake-tile" href="recipes/recipe-raspberry-lime-mini-cheese-cake.php" data-recipe-type="dessert" data-sort="raspberry-lime-mini-cheese-cake">
						<div class="recipe-tile">
							<div id="raspberry-lime-mini-cheese-cake" class="recipe-background">
								<div class="recipe-tile-wrapper">
									<div class="recipe-name">Raspberry Lime Mini Cheese Cake</div>
								</div>						
							</div>
						</div>
					</a>

					<a class="recipe-tile-link tomato-basil-chicken-tile" href="recipes/recipe-tomato-basil-chicken.php" data-recipe-type="entree" data-sort="tomato-basil-chicken">
						<div class="recipe-tile">
							<div id="tomato-basil-chicken" class="recipe-background">
								<div class="recipe-tile-wrapper">
									<div class="recipe-name">Tomato Basil Bake Chicken</div>
								</div>						
							</div>
						</div>
					</a>

					<a class="recipe-tile-link curry-mango-chicken-coconut-rice-tile" href="recipes/recipe-curry-mango-chicken-coconut-rice.php" data-recipe-type="entree" data-sort="curry-mango-chicken-coconut-rice">
						<div class="recipe-tile">
							<div id="curry-mango-chicken-coconut-rice" class="recipe-background">
								<div class="recipe-tile-wrapper">
									<div class="recipe-name">Curry Mango Chicken with Coconut Rice</div>
								</div>						
							</div>
						</div>
					</a>

					<a class="recipe-tile-link cinnamon-rolls-apple-sauce-tile" href="recipes/recipe-cinnamon-rolls-apple-sauce.php" data-recipe-type="dessert" data-sort="cinnamon-rolls-apple-sauce">
						<div class="recipe-tile">
							<div id="cinnamon-rolls-apple-sauce" class="recipe-background">
								<div class="recipe-tile-wrapper">
									<div class="recipe-name">Cinnamon Rolls with Apple Sauce</div>
								</div>
							</div>
						</div>
					</a>

					<a class="recipe-tile-link mixed-berry-cinnamon-studel-tile" href="recipes/recipe-mixed-berry-cinnamon-studel.php" data-recipe-type="dessert" data-sort="mixed-berry-cinnamon-studel">
						<div class="recipe-tile">
							<div id="mixed-berry-cinnamon-studel" class="recipe-background">
								<div class="recipe-tile-wrapper">
									<div class="recipe-name">Mixed Berry Cinnamon Studel Bites</div>
								</div>
							</div>
						</div>
					</a>

					<a class="recipe-tile-link lemon-cream-square-tile" href="recipes/recipe-lemon-cream-squares.php" data-recipe-type="dessert" data-sort="lemon-cream-square">
						<div class="recipe-tile">
							<div id="lemon-squares" class="recipe-background">
								<div class="recipe-tile-wrapper">
									<div class="recipe-name">Lemon Cream Squares</div>
								</div>
							</div>
						</div>
					</a>

					<a class="recipe-tile-link apple-crisp-tile" href="recipes/recipe-apple-crisp.php" data-recipe-type="dessert" data-sort="apple-crisp">
						<div class="recipe-tile">
							<div id="apple-crisp" class="recipe-background">
								<div class="recipe-tile-wrapper">
									<div class="recipe-name">Apple Crisp</div>
								</div>						
							</div>
						</div>
					</a>

					<a class="recipe-tile-link cherry-surprises-tile" href="recipes/recipe-cherry-surprises.php" data-recipe-type="dessert" data-sort="cherry-surprises">
						<div class="recipe-tile">
							<div id="cherry-surprises" class="recipe-background">
								<div class="recipe-tile-wrapper">
									<div class="recipe-name">Cherry Surprises</div>
								</div>
							</div>
						</div>
					</a>

					<a class="recipe-tile-link pink-party-squares-tile" href="recipes/recipe-pink-party-squares.php" data-recipe-type="dessert" data-sort="pink-party-squares" >
						<div class="recipe-tile">
							<div id="pink-party-squares" class="recipe-background">
								<div class="recipe-tile-wrapper">
									<div class="recipe-name">Pink Party Squares</div>
								</div>						
							</div>
						</div>
					</a>

					<a class="recipe-tile-link parmesan-panko-chicken-tile" href="recipes/recipe-parmesan-panko-chicken.php" data-recipe-type="entree" data-sort="parmesan-panko-chicken">
						<div class="recipe-tile">
							<div id="parmesan-panko-chicken" class="recipe-background">
								<div class="recipe-tile-wrapper">
									<div class="recipe-name">Parmersan Panko Chicken</div>
								</div>						
							</div>
						</div>
					</a>
												
				</div>	
				<div class="fb-comments" data-width="100%" data-href="http://jessescott.plutolighthouse.net/recipes/recipe-pink-party-squares.php" data-numposts="5"></div>
			</div>	
		</div>	
	</div>
</div>

<!-- end page content -->

<?php
include "php/footer.php";
?>

<div class="cd-transition-layer" data-frame="25"> 
	<div class="bg-layer"></div>
</div> <!-- .cd-transition-layer -->

</body>
</html>