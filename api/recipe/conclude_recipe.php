<?php
$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
$recipe_id = filter_input(INPUT_GET, "recipe_id", FILTER_VALIDATE_INT);

$condition = $id && $recipe_id;

if ($condition) {
    $db = DBConnection::getConnection();
    $query = $db->prepare("UPDATE recipes SET delivered = 1 WHERE recipes.id = :recipe_id");
    $query->bindParam("recipe_id", $recipe_id);
    $query->execute();

    session_start();

    $_SESSION["success-change"] = ($query->rowCount() == 1) ? "Recept is gebracht" : false;

} else $_SESSION["success-change"] = false;


header("Location: index.php?view=pharmacist&page=patient&id=$id&subpage=open");