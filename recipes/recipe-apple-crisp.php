<!DOCTYPE html>


<?php
require_once "../partials/head.php";
?>

<link rel="stylesheet" type="text/css" href="/library/css/food.css" />
<link rel="stylesheet" type="text/css" href="/library/css/recipes.css" />

<script type="text/javascript" src="../js/callbyscroll.js"></script>

</head>

<body id="body" class="body" data-page="apple-crisp">

<!-- begin header -->
<div id="header" class="header">
    <div class="header_wrapper">

	<?php
	require_once "../partials/sites.php";
	?>

    </div>
</div>
<!-- end header -->

<!-- begin content -->
<div id="apple-crisp-page" class="page">
	<div id="background" class="background"></div>

	<div id="content" class="content">
		<div class="content_wrapper">
			<div class="recipe">					
				<div class="title">
					<h2>Apple Crisp</h2>
					<img src="/library/images/food/apple-crisp-banner.jpg" alt="apple-crisp-banner" width="100%">
				</div>

				<?php
				require_once "../partials/recipe-social.php";
				?>

				<div class=recipe-path>
					<div>
						<a href="../food.php">Recipes</a>
					</div>
					<div>Apple Crisp</div>
				</div>

				<div class="picture main">
					<img src="/library/images/food/apple-crisp-title.jpg" alt="apple-crisp" width="100%">
				</div>

				<div class="ingredients">
					<h2>Ingredients</h2>						
					<div class="list one">
						<h3>Filling: </h3>
						<ul>
							<li>6 apples, peeled and sliced</li>
							<li>1 tbsp of lemon juice, 1/2 tsp of lemon zest</li>
							<li>1 tsp of vanilla extract</li>
						</ul>
					</div>
					<div class="list two">
						<h3>Topping: </h3>
						<ul>
							<li>1/2 cup of rolled oats</li>
							<li>1/2 cup of brown sugar</li>
							<li>1/2 cup of flour</li>
							<li>1/3 cup of butter</li>
							<li>1 tsp of cinnamon</li>
							<li>1/4 tsp of ginger</li>
							<li>1/8 tsp of nutmmeg</li>
							<li>1/2 cup of walnuts (optional)</li>
						</ul>
					</div>
				</div>

				<div class="utensils">
					<h2>Utensils</h2>
					<ul>
						<li>1 large mixing bowls</li>
						<li>1L baking dish</li>
						<li>spoon or whisk</li>										
					</ul>
				</div>

				<div class="picture second">
					<img src="/library/images/food/apple-crisp-ingredients.jpg" alt="apple-crisp-2" width="100%">
				</div>

				<div class="directions">
					<h2>Directions</h2>
					<ul>
						<li>Pre-heat oven to 350°.</li>
						<li>Combine the <strong>apple slices, lemon juice and zest,</strong> and <strong>vanilla extract</strong> in the <strong>baking dish</strong></li>
						<li>Combine the <strong>rolled oats, brown sugar, flour, cinnamon, nutmeg,</strong> and <strong>ginger</strong> in <strong>a large mixing bowl</strong></li>
						<li>Cut in butter until crumbly</li>
						<li>Pour topping over the apple filling</li>
						<li>Bake (at 350°) for 35 minutes.</li>
						<li>Cool for 1 hour.</li>
					</ul>
				</div>

				<div class="picture third">
					<img src="/library/images/food/apple-crisp-bonus.jpg" alt="apple-crisp-3" width="100%">
				</div>

				<div class="bonus">
					<h2>Bonus: The Obvious</h2>
										
					<div class="directions">
					<h3>Directions</h3>	
						<ul>
							<li>Serve with ice cream, duh!</li>
						</ul>
					</div>	
				</div>
				<div class="fb-comments" data-width="100%" data-href="http://www.darwinsbark.ca/recipes/recipe-apple-crisp.php" data-numposts="5"></div>
			</div>
		</div>	
	</div>
</div>
<!-- end page content -->

<?php
require_once "../partials/footer.php";
?>

<?php
require_once "../partials/scripts.php";
?>


</body>
</html>