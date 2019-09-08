
<!DOCTYPE html>

<?php
require_once "../partials/head.php";
?>

<link rel="stylesheet" type="text/css" href="/library/css/food.css" />
<link rel="stylesheet" type="text/css" href="/library/css/recipes.css" />

<script type="text/javascript" src="/library/js/callbyscroll.js"></script>

</head>


<?php
	include "../php/recipe-book.php";

	$recipe_title = $TomatoBasilChicken->name;
	$recipe_name = $TomatoBasilChicken->file_name;
?>


<body id="body" class="body" data-page="<?= $recipe_name ?>">

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
<div id="<?= $recipe_name ?>-page" class="page">
	<div id="background" class="background"></div>

	<div id="test-region" style="height: 600px; width: 100%; color: #fff; padding: 100px 0 0;">
	<?php 

	//$handler = new PDO('mysql:host=jas@138.197.84.156;dbname=darwinsbark','admin','Thrice');

	// $hostname='138.197.84.156';
	// $port='22';
	$hostname='127.0.0.1';
	$port='3306';
	$username='admin';
	$password='Thrice';

	try {
		$dbh = new PDO("mysql:host=$hostname;port=$port;dbname=darwinsbark",$username,$password);

		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // <== add this line
		echo 'Connected to Database<br/>';

		$sql = "SELECT * FROM darwinsbark.recipes";
		foreach ($dbh->query($sql) as $row)
		{
			echo $row["name"] ." - ". $row["category"] ."<br/>";
		}


		$dbh = null;
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
	}

	?>
	</div>

	<div id="content" class="content">
		<div class="content_wrapper">
			<div class="recipe">
				<div class="title">
					<h2><?= $recipe_title ?></h2>
					<img src="/library/images/food/<?= $recipe_name ?>/<?= $recipe_name ?>-banner.jpg" alt="<?= $recipe_name ?>-banner" width="100%">
				</div>

				<?php
				require_once "../partials/recipe-social.php";
				?>

				<div class="recipe-path">
					<div>
						<a href="../food.php">Recipes</a>
					</div>
					<div><?= $recipe_title ?></div>
				</div>

				<div class="picture main">
					<img src="/library/images/food/<?= $recipe_name ?>/<?= $recipe_name ?>-spoon.jpg" alt="<?= $recipe_name ?>-spoon" width="100%">
				</div>

				<div class="ingredients">
					<h2>Ingredients</h2>						
					<ul>
						<li>4 pieces of chicken breasts</li>
						<li>1 (5.5ml) can of tomato paste </li>
						<li>1/4 cup of red wine vinegar</li>
						<li>1/3 cup of red wine</li>
						<li>3 tbsp of olive oil</li>
						<li>1 tbsp of dried basil</li>
						<li>1/2 tbsp of red pepper flakes</li>
						<li>1/2 tbsp of salt</li>
						<li>1/2 tbsp of pepper</li>
					</ul>
				</div>

				<div class="picture third">
					<img src="/library/images/food/<?= $recipe_name ?>/<?= $recipe_name ?>-dish.jpg" alt="<?= $recipe_name ?>-dish" width="100%">
				</div>

				<div class="picture third">
					<img src="/library/images/food/<?= $recipe_name ?>/<?= $recipe_name ?>-breast.jpg" alt="<?= $recipe_name ?>-breast" width="100%">
				</div>

				<div class="utensils">
					<h2>Utensils</h2>
					<ul>
						<li>1 mixing bowls</li>
						<li>1 baking dish</li>						
						<li>2.5L ziplock bag</li>										
					</ul>
				</div>

				<div class="directions">
					<h2>Directions</h2>
					<ul>
						<li>Pre-heat oven to 375°.</li>
						<li>Combine all ingredients except the chicken in a large mixing bowl.</li>
						<li>Marinate chicken breast in the ziplock bag for at least 30 mins.</li>
						<li>Place chicken breast in baking dish.</li>
						<li>Bake (at 375°) for 15 minutes.</li>
					</ul>
				</div>
				<div class="fb-comments" data-width="100%" data-href="http://www.darwinsbark.ca/" data-numposts="5"></div>
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