<?php
if (!empty($_GET["name"])) {
    require_once "api/DBConnection.php";
    $name = $_GET["name"];
    switch ($name) {
        case "add_recipe":
            exit(require_once "api/recipe/add_recipe.php");
        case "edit_recipe":
            exit(require_once "api/recipe/edit_recipe.php");
        case "prepare_recipe":
            exit(require_once "api/recipe/prepare_recipe.php");
        case "unprepare_recipe":
            exit(require_once "api/recipe/unprepare_recipe.php");
        case "conclude_recipe":
            exit(require_once "api/recipe/conclude_recipe.php");
        case "pay_recipe":
            exit(require_once "api/recipe/pay_recipe.php");
    }
}
require_once "404.php";