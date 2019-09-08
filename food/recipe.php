
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

	$file_name = $_GET['name'];
	$body_class = 'body';
	$recipe_name = $recipes[$file_name]->file_name;
	$recipe_title = $recipes[$file_name]->name;
	$recipe_has_images = $recipes[$file_name]->has_images;
	$recipe_hex_color = $recipes[$file_name]->hex_color;

	if(!isset($recipe_name)) {?>
		<script>
			window.location = '../404.php';
		</script>
	<?php }


	//Attempt DB Connection
	try {
		$dbh = new PDO("mysql:host=$hostname;port=$port;dbname=$dbname",$username,$password);
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		//Generate Recipe Content
		$query_ingredients = $dbh->prepare("SELECT * FROM darwinsbark.ingredients WHERE recipe = :recipe_title");
		$query_ingredients->bindParam(':recipe_title',$recipe_title,PDO::PARAM_STR);
		$query_ingredients->execute();
		$query_ingredients_row_count = $query_ingredients->rowCount();

		$query_utensils = $dbh->prepare("SELECT * FROM darwinsbark.utensils WHERE recipe = :recipe_title");
		$query_utensils->bindParam(':recipe_title',$recipe_title,PDO::PARAM_STR);
		$query_utensils->execute();
		$query_utensils_row_count = $query_utensils->rowCount();

		$query_directions = $dbh->prepare("SELECT * FROM darwinsbark.directions WHERE recipe = :recipe_title");
		$query_directions->bindParam(':recipe_title',$recipe_title,PDO::PARAM_STR);
		$query_directions->execute();
		$query_directions_row_count = $query_directions->rowCount();

		if ($query_ingredients_row_count > 0 && $query_utensils_row_count > 0 && $query_directions_row_count > 0 && $recipe_has_images == 1) {
			$body_class = $body_class . ' has_full_content';
		}

		//clear
		$dbh = null;
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
	}
?>


<body id="body" class="<?= $body_class;?>" data-page="<?= $recipe_name ?>">

<?php // Header ?>
<div id="header" class="header">
    <div class="header_wrapper">

	<?php
	require_once "../partials/sites.php";
	?>

    </div>
</div>

<?php // Content ?>
<div id="<?= $recipe_name ?>-page" class="page">
	<div id="background" class="background"></div>
	<div id="content" class="content">
		<div class="content_wrapper">
			<div class="recipe">
				<?php // Recipe Title ?>
				<div class="title" style="background: #<?= $recipe_hex_color ?>">
					<h2><?= $recipe_title ?></h2>
				<?php if($recipe_has_images == 1) : ?>
					<img src="/library/images/food/<?= $recipe_name ?>/<?= $recipe_name ?>-title.jpg" alt="<?= $recipe_name ?>-title" height="100%">
				<?php endif;?>
				</div>

				<?php // Recipe Social Share Section ?>
				<?php include "../partials/share.php";	?>

				<?php // Recipe Social Share Section ?>
				<div class="recipe-path">
					<div class="recipe-path-wrapper" style="background: #<?= $recipe_hex_color ?>">
						<i class="fa fa-chevron-right"></i><span><a class="recipe-path-link" href="../food.php">Recipes</a></span> :	<span><?= $recipe_title ?></span>
					</div>
				</div>

				<?php // Recipe Content Block 1 ?>
	 			<div class="recipe_content_block">				
				<?php if($recipe_has_images == 1) : ?>
					<div class="recipe_content picture main">
						<img src="/library/images/food/<?= $recipe_name ?>/<?= $recipe_name ?>-image-1.jpg" alt="<?= $recipe_name ?>-image-1" width="100%">
					</div>
				<?php endif;?>

				<?php if ($query_ingredients_row_count > 0) : ?>	
					<div class="recipe_content ingredients">
						<h2>Ingredients</h2>
						<ul class="recipe_list">
						<?php 
							
						$h3_count = 0;
						foreach ($query_ingredients as $col)
						{
							$ingredient = new Recipe_Content($col["recipe"],$col["ingredient"],$col["isLabel"]);
							if ($ingredient->is_label == 1) {
								if ($h3_count == 1) {
									?>
									<br />
									<?php
								}
								?>
								<h3><?=$ingredient->content;?></h3>
								<?php
								$h3_count = 1;
							}
							else {
								?>
								<li><?=$ingredient->content;?></li>
								<?php
							}
						}?>	
						</ul>
					</div>
				<?php endif; ?>
				</div>

				<?php // Recipe Content Block 2 ?>
	 			<div class="recipe_content_block">	
				<?php if($recipe_has_images == 1) : ?>
					<div class="recipe_content picture second">
						<img src="/library/images/food/<?= $recipe_name ?>/<?= $recipe_name ?>-image-2.jpg" alt="<?= $recipe_name ?>-image-2" width="100%">
					</div>
				<?php endif;?>

				<?php if ($query_utensils_row_count > 0) : ?>
					<div class="recipe_content utensils">
						<h2>Utensils</h2>
						<ul class="recipe_list">
						<?php
							
						$h3_count = 0;
						foreach ($query_utensils as $col)
							{
								$utensil = new Recipe_Content($col["recipe"],$col["utensil"],$col["isLabel"]);
								
								if ($utensil->is_label == 1) {
									if ($h3_count == 1) {
										?>
										<br />
										<?php
									}
									?>
									<h3><?=$utensil->content;?></h3>
									<?php
									$h3_count = 1;
								}
								else {
									?>
									<li><?=$utensil->content;?></li>
									<?php
								}
							}?>
						</ul>
					</div>
				<?php endif;?>
				</div>
	 			
				<?php // Recipe Content Block 3 ?>
	 			<div class="recipe_content_block">	
				<?php if($recipe_has_images == 1) : ?>
					<div class="recipe_content picture third">
						<img src="/library/images/food/<?= $recipe_name ?>/<?= $recipe_name ?>-image-3.jpg" alt="<?= $recipe_name ?>-image-3" width="100%">
					</div>
				<?php endif;?>

				<?php if ($query_directions_row_count > 0) : ?>
					<div class="recipe_content directions">
						<h2>Directions</h2>					
						<ul class="recipe_list">
						<?php
							
						$h3_count = 0;
						foreach ($query_directions as $col)
							{
								$direction = new Recipe_Content($col["recipe"],$col["direction"],$col["isLabel"]);

								if ($direction->is_label == 1) {
									if ($h3_count == 1) {
										?>
										<br />
										<?php
									}
									?>
									<h3><?=$direction->content;?></h3>
									<?php
									$h3_count = 1;
								}
								else {
									?>
									<li><?=$direction->content;?></li>
									<?php
								}
							}?>
						</ul>
					</div>
				<?php endif;?>
				</div>
				<div class="fb-comments" data-width="100%" data-href="http://www.darwinsbark.ca/" data-numposts="5"></div>
			</div>
		</div>	
	</div>
</div>

<?php
require_once "../partials/footer.php";
?>

<?php
require_once "../partials/scripts.php";
?>

</body>
</html>