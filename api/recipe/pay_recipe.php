<?php
$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

if ($id !== false) {
    $db = DBConnection::getConnection();
    $query = $db->prepare('SELECT medicines.insured FROM recipes INNER JOIN medicines ON medicines.id = recipes.medicine_id where recipes.id = :id');
    $query->bindParam('id', $id);
    $query->execute();
    $insured = $query->fetch()["insured"];
    $query = $db->prepare('UPDATE recipes SET billed = 1 WHERE id = :id');
    $query->bindParam('id', $id);
    $query->execute();

    if ($insured) {
        $payment = "Recept is betaald";
    } else $payment = "Recept is gefactureerd";

    session_start();
    $_SESSION['success-change'] = ($query->rowCount() == 1) ? $payment : false;

} else {
    $_SESSION['success-change'] = false;
}
header("Location: index.php?view=insurance&page=billing");