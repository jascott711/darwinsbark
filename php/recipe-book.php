<?php

/**
* main Recipe class
*/
class Recipe {

	public $name;
	public $file_name;
	public $category;
	public $has_images;
	public $hex_color;

	function __construct($name, $category, $has_images, $hex_color)
	{
		$this->name = $name;
		$this->file_name = strtolower(str_replace(' ','-',$name));
		$this->category = $category;
		$this->has_images = $has_images;
		$this->hex_color = $hex_color;
	}

}

/**
* holds ingredients for a Recipe
*/
class Recipe_Content
{
	public $recipe;
	public $content;
	public $is_label;

	function __construct($recipe,$content,$is_label)
	{
		$this->recipe = $recipe;
		$this->content = $content;
		$this->is_label = $is_label;
	}
}

$TomatoBasilChicken = new Recipe("Tomato Basil Chicken","entree");
$AppleCrisp = new Recipe("Apple Crisp","dessert");


include "cred.php";

//where the recipes from the db are stored
$recipes = array();

try {
	//connect to db
	$dbh = new PDO("mysql:host=$hostname;port=$port;dbname=$dbname",$username,$password);

	//test connection
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	//create recipes objects from db
	$sql = $dbh->query("SELECT * FROM darwinsbark.recipes");
	foreach ($sql as $col)
	{
		$recipe = new Recipe($col["name"], $col["category"],$col["hasImages"],$col["hexColor"]);
		$recipes[$recipe->file_name] = $recipe;
	}

	//clear
	$dbh = null;
}
catch(PDOException $e)
{
	echo $e->getMessage();
}
