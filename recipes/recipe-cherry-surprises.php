<!DOCTYPE html>


<?php
require_once "../partials/head.php";
?>

<link rel="stylesheet" type="text/css" href="/library/css/food.css" />
<link rel="stylesheet" type="text/css" href="/library/css/recipes.css" />

<script type="text/javascript" src="../js/callbyscroll.js"></script>

</head>

<body id="body" class="body" data-page="cherry-surprises">

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

<div id="cherry-surprises-page" class="page">
	<div id="background" class="background"></div>

	<div id="content" class="content">
		<div class="content_wrapper">
			<div class="recipe">							
				<div class="title">
					<h2>Cherry Surprises</h2>
					<img src="/library/images/food/cherry-surprises-banner.jpg" alt="cherry-surprises-banner" width="100%">
				</div>

				<?php
				require_once "../partials/recipe-social.php";
				?>

				<div class=recipe-path>
					<div>
						<a href="../food.php">Recipes</a>
					</div>
					<div>Cherry Surprises</div>
				</div>

				<div class="picture main">
					<img src="/library/images/food/cherry-surprises-title.jpg" alt="cherry-surprises" width="100%">
				</div>

				<div class="ingredients">
					<h2>Ingredients</h2>
					<div class="list">
						<ul>
							<li>1 stick (1/2 cup) of melted butter</li>
							<li>1 1/2 cup of graham-cracker crumbs</li>
							<li>1/4 cup of sugar</li>
						</ul>
					</div>
				</div>

				<div class="utensils">
					<h2>Utensils</h2>
					<ul>
						<li>2 large mixing bowls</li>
						<li>8x8 baking dish</li>
						<li>sauce pan</li>
						<li>whisk</li>
						<li>serrated knife</li>											
					</ul>
				</div>

				<div class="picture second">
					<img src="/library/images/food/cherry-surprises-ingredients.jpg" alt="cherry-surprises-2" width="100%">
				</div>

				<div class="directions">
					<h2>Directions</h2>
					<ul>
						<li>Pre-heat oven to 350°.</li>
						<li>Combine <strong>graham-cracker crumbs</strong> and <strong>sugar</strong> in <strong>a large mixing bowl</strong>. Pour in <strong>melted butter</strong>.</li>
						<li>Cover the <strong>baking dish</strong> with <strong>parchment paper</strong> and press mixture one inch covering base and sides.</li>
						<li>Bake for 12 minutes, until crust is light brown.</li>
						<li>Cool for 30 minutes.</li>
					</ul>
				</div>
				<div class="fb-comments" data-width="100%" data-href="http://www.darwinsbark.ca/recipes/recipe-cherry-surprises.php" data-numposts="5"></div>
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