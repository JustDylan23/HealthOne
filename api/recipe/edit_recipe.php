<?php
require_once "api/recipe/validate_recipe.php";

if ($isValid) {
    $db = DBConnection::getConnection();
    $query = $db->prepare("UPDATE recipes SET medicine_id = :medicine, amount = :aantal, comment = :commentaar 
            WHERE recipes.id = :id");
    $query->bindParam("id", $id);
    $query->bindParam("medicine", $med_id);
    $query->bindParam("aantal", $amount);
    $query->bindParam("commentaar", $comment);
    $query->execute();
}
session_start();
$_SESSION['success-change'] = ($isValid && $query->rowCount() == 1) ? "Recept is aangepast." : false;

header("Location: index.php?view=pharmacist&page=workload&subpage=unprepared");
