
<!DOCTYPE html>

<?php
require_once "partials/head.php";
?>

<link rel="stylesheet" type="text/css" href="/library/css/food.css" />
<link rel="stylesheet" type="text/css" href="/library/css/recipes.css" />

<script type="text/javascript" src="/library/js/callbyscroll.js"></script>

</head>

<body id="body" class="body" data-page="<?= $recipe_name ?>">

<!-- begin header -->
<div id="header" class="header">
    <div class="header_wrapper">

	<?php
	require_once "partials/sites.php";
	?>

    </div>
</div>
<!-- end header -->

<!-- begin content -->
<div id="<?= $recipe_name ?>-page" class="page">
	<div id="background" class="background"></div>
	<div id="content" class="content">
		<div class="content_wrapper">
			<div class="recipe">
				<div class="title">
					<h2>404... :(</h2>

				</div>
		
				<div class="recipe-path">
					<div class="recipe-path-wrapper" style="background: #000;">
						<i class="fa fa-chevron-right"></i><span><a class="recipe-path-link" href="../food.php">Recipes</a></span> :	<span>Error page</span>
					</div>
				</div>

				<div class="ingredients">
					<p>The page you are trying to view does not exist.<br />Please return to the previous page for more recipes.</p>						
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