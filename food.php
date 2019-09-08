<!DOCTYPE html>

<?php
require_once "partials/head.php";
?>

<link rel="stylesheet" type="text/css" href="library/css/food.css" />

<script type="text/javascript" src="library/js/callbyscroll.js"></script>

</head>

<body id="body" class="body" data-page="food">

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
<div id="banner" class="banner">
	<div class="banner_wrapper">
		<div id="slideShowImages">
			<img src="library\images\food\banners\b1.jpg" alt="Slide 1" />
			<img src="library\images\food\banners\b2.jpg" alt="Slide 2" />
			<img src="library\images\food\banners\b3.jpg" alt="Slide 3" />    
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
				
				<?php include "partials/share.php";	?>

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
				
				<div id="recipe-sorter" class="recipe-sorting hide"></div>
				<div class="recipe-list">

				<?php include "php/recipe-book.php"; ?>
				<?php foreach ($recipes as $recipe) { ?>
					<a class="recipe-tile-link <?= $recipe->file_name ?>-tile" href="food/recipe.php?name=<?= $recipe->file_name ?>" data-recipe-type="<?= $recipe->category ?>" data-sort="<?= $recipe->file_name ?>">
						<div id="<?= $recipe->file_name ?>" class="recipe-tile"<?php if($recipe->has_images == 0) : ?> style="background: #<?= $recipe->hex_color; ?>"<?php endif;?>>
							<div class="recipe-tile-wrapper">		
							<?php if($recipe->has_images == 1) : ?>					
								<img class="recipe-background" src="library/images/food/<?= $recipe->file_name ?>/<?= $recipe->file_name ?>-title.jpg" alt="<?= $recipe->file_name ?>" />
							<?php endif;?>
								<div class="recipe-name"><?= $recipe->name ?></div>
							</div>						
						</div>
					</a>
				<?php	} ?>
												
				</div>	
				<div class="fb-comments" data-width="100%" data-href="http://www.darwinsbark.ca/recipes/recipe-pink-party-squares.php" data-numposts="5"></div>
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


<div class="cd-transition-layer" data-frame="25"> 
	<div class="bg-layer"></div>
</div> <!-- .cd-transition-layer -->

</body>
</html>