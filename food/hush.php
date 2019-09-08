
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
			//window.location = '../404.php';
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

		//clear
		//$dbh = null;
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
	}
?>


<body id="body" class="<?= $body_class;?>" data-page="<?= $recipe_name ?>">

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
	<div id="content" class="content">
		<div class="content_wrapper">
			<div class="recipe">
				<div class="title" style="background: #<?= $recipe_hex_color ?>">
					<h2>Create Recipe</h2>
				</div>

				<?php include "../partials/share.php"; ?>

				<div class="recipe-path">
					<div class="recipe-path-wrapper" style="background: #<?= $recipe_hex_color ?>">
						<i class="fa fa-chevron-right"></i><span><a class="recipe-path-link" href="../food.php">Recipes</a></span> :	<span><?= $recipe_title ?></span>
					</div>
				</div>

				<?php // Recipe ?>
	 			<div class="recipe_content_block">				
				<?php if($recipe_has_images == 1) : ?>
					<div class="recipe_content picture main">
						<img src="/library/images/food/<?= $recipe_name ?>/<?= $recipe_name ?>-title.jpg" alt="<?= $recipe_name ?>-title" width="100%">
					</div>
				<?php endif;?>

					<div class="recipe_content ingredients">
						<h2>Add Recipe Info</h2>
						<form id="create_recipe" action="create-recipe.php" method="post">
							<h3>Recipe Name</h3>
							<input name="recipename" rows="2" width="100%" /><br />
							<h3>Recipe Catogory</h3>
							<input name="recipecategory" rows="2" width="100%" /><br />
							<h3>Hex Color</h3>
						    <input name="recipehexColor" rows="2" width="100%" placeholder="000000"/>
                        </form>
					</div>
				</div>

				<?php // Recipe Content Block 1 ?>
	 			<div class="recipe_content_block">				
				<?php if($recipe_has_images == 1) : ?>
					<div class="recipe_content picture main">
						<img src="/library/images/food/<?= $recipe_name ?>/<?= $recipe_name ?>-image-1.jpg" alt="<?= $recipe_name ?>-image-1" width="100%">
					</div>
				<?php endif;?>

					<div class="recipe_content ingredients">
						<h2>Add Ingredients</h2>
                        <div class="ingredient-row">
                            <input class="recipe-ingredient" form="create_recipe" name="recipe-ingredient[]" width="100%" />
                            <button class="del-ingredient-btn" width="100px">-</button>
                            <button class="add-ingredient-btn" width="100px">+</button>
                        </div>
					</div>
                    <script>
                        var ingredient_row = $('.ingredient-row')[0].outerHTML;
                        var add_ingredient_btn = $('.add-ingredient-btn')[0].outerHTML;

                        $(document).on('click', '.add-ingredient-btn', function(){
                            $('.ingredient-row').last().parent().append(ingredient_row);
                            $(this).remove();
                        });

                        $(document).on('click', '.del-ingredient-btn', function() {
                            if ($('.ingredient-row').length > 1) {
                                $(this).parent('.ingredient-row').remove();
                                if (!$('.add-ingredient-btn').length > 0){
                                    $('.ingredient-row').last().append(add_ingredient_btn);
                                }
                            }
                        });
                    </script>
				</div>

				<?php // Recipe Content Block 2 ?>
	 			<div class="recipe_content_block">
				<?php if($recipe_has_images == 1) : ?>
					<div class="recipe_content picture second">
						<img src="/library/images/food/<?= $recipe_name ?>/<?= $recipe_name ?>-image-2.jpg" alt="<?= $recipe_name ?>-image-2" width="100%">
					</div>
				<?php endif;?>

					<div class="recipe_content utensils">
						<h2>Add Utensils</h2>
                        <div class="utensil-row">
                            <input class="recipe-utensil" form="create_recipe" name="recipe-utensil[]" width="100%" />
                            <button class="del-utensil-btn" width="100px">-</button>
                            <button class="add-utensil-btn" width="100px">+</button>
                        </div>
					</div>
                    <script>
                        var utensil_row = $('.utensil-row')[0].outerHTML;
                        var add_utensil_btn = $('.add-utensil-btn')[0].outerHTML;

                        $(document).on('click', '.add-utensil-btn', function(){
                            $('.utensil-row').last().parent().append(utensil_row);
                            $(this).remove();
                        });

                        $(document).on('click', '.del-utensil-btn', function() {
                            if ($('.utensil-row').length > 1) {
                                $(this).parent('.utensil-row').remove();
                                if (!$('.add-utensil-btn').length > 0){
                                    $('.utensil-row').last().append(add_utensil_btn);
                                }
                            }
                        });
                    </script>
				</div>
	 			
				<?php // Recipe Content Block 3 ?>
	 			<div class="recipe_content_block">	
				<?php if($recipe_has_images == 1) : ?>
					<div class="recipe_content picture third">
						<img src="/library/images/food/<?= $recipe_name ?>/<?= $recipe_name ?>-image-3.jpg" alt="<?= $recipe_name ?>-image-3" width="100%">
					</div>
				<?php endif;?>

					<div class="recipe_content directions">
						<h2>Add Directions</h2>
                        <div class="direction-row">
                            <input class="recipe-direction" form="create_recipe" name="recipe-direction[]" width="100%" />
                            <button class="del-direction-btn" width="100px">-</button>
                            <button class="add-direction-btn" width="100px">+</button>
                        </div>
					</div>
                    <script>
                        var direction_row = $('.direction-row')[0].outerHTML;
                        var add_direction_btn = $('.add-direction-btn')[0].outerHTML;

                        $(document).on('click', '.add-direction-btn', function(){
                            $('.direction-row').last().parent().append(direction_row);
                            $(this).remove();
                        });

                        $(document).on('click', '.del-direction-btn', function() {
                            if ($('.direction-row').length > 1) {
                                $(this).parent('.direction-row').remove();
                                if (!$('.add-direction-btn').length > 0){
                                    $('.direction-row').last().append(add_direction_btn);
                                }
                            }
                        });
                    </script>
				</div>

                <div class="recipe_content_block">
                    <div class="recipe_content submit">
                        <input class="submission" type="submit" name="submit" form="create_recipe" />
                    </div>
                </div>
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