<?php
require_once "api/recipe/validate_recipe.php";

if ($isValid) {
    $db = DBConnection::getConnection();
    $query = $db->prepare(
        'INSERT INTO Recipes (patient_id, medicine_id, prescriber_id, amount, date, delivered, deliverer_id, comment)
    VALUES (:id, :med_id, NULL, :amount , current_timestamp(), 0, NULL, :comment)');
    $query->bindParam('id', $id);
    $query->bindParam('med_id', $med_id);
    $query->bindParam('amount', $amount);
    $query->bindParam('comment', $comment);
    $query->execute();
}

session_start();
$_SESSION['success-change'] = ($isValid && $query->rowCount() == 1) ? "Succesvol het recept uitgeschreven." : false;

header('Location: index.php?view=doctor&page=patients');
