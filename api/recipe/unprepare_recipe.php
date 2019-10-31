<?php
$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

if ($id) {
    $db = DBConnection::getConnection();
    $query = $db->prepare("UPDATE recipes SET recipes.prepared = 0 WHERE recipes.id = :id");
    $query->bindParam("id", $id);
    $query->execute();

    session_start();

    $_SESSION['success-change'] = ($query->rowCount() == 1) ? "Recept is onbereid" : false;
    header("Location: index.php?view=pharmacist&page=workload&subpage=prepared");
}

