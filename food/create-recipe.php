<?php

function create_recipe()
{
    $recipe_name = $_POST['recipename'];
    $recipe_category = $_POST['recipecategory'];
    $recipe_hex_color = $_POST['recipehexColor'];
//    $recipe_ingredient = $_POST['recipe-ingredient'];
//    $recipe_utensil = $_POST['recipe-utensil'];
//    $recipe_direction = $_POST['recipe-direction'];


    try {
        include "../php/cred.php";

        $dbh = new PDO("mysql:host=$hostname;port=$port;dbname=$dbname",$username,$password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //create recipes objects from db
        $add_recipe = $dbh->prepare("INSERT INTO recipes(name,category,hexColor) VALUES('$recipe_name','$recipe_category','$recipe_hex_color')");
        $add_recipe->execute();

        foreach ($_POST['recipe-ingredient'] as $key => $r) {
            $add_recipe_ingredient = $dbh->prepare("INSERT INTO ingredients(recipe,ingredient) VALUES('$recipe_name','$r')");
            $add_recipe_ingredient->execute();
            var_dump($r);
        }
        foreach ($_POST['recipe-utensil'] as $key => $r) {
            $add_recipe_utensil = $dbh->prepare("INSERT INTO utensils(recipe,utensil) VALUES('$recipe_name','$r')");
            $add_recipe_utensil->execute();
            var_dump($r);
        }
        foreach ($_POST['recipe-direction'] as $key => $r) {
            $add_recipe_direction = $dbh->prepare("INSERT INTO directions(recipe,step,direction) VALUES('$recipe_name','$key','$r')");
            //$add_recipe_direction->execute();
            var_dump($r);
        }
        //clear
        $dbh = null;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }

}

if(isset($_POST['submit'])){
    create_recipe();
}

var_dump($r);

//header("Location: ../food.php");