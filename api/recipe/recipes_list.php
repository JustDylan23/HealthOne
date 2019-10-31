<?php
$query = "";
if (isset($_GET["subpage"]) && $_GET["subpage"] === "unprepared") {
    $query = "SELECT Recipes.id, Recipes.date, Patients.first_name, Medicines.name, Medicines.insured, Recipes.amount, 
    Recipes.delivered, Recipes.prepared, Recipes.comment
    FROM Recipes 
    INNER JOIN Medicines ON Recipes.medicine_id = Medicines.id 
    INNER JOIN Patients ON Recipes.patient_id = Patients.id 
    WHERE delivered = 0 AND prepared = 0
    ORDER BY date DESC";
} elseif (isset($_GET["subpage"]) && $_GET["subpage"] === "prepared") {
    $query = "SELECT Recipes.id, Recipes.date, Patients.first_name, Medicines.name, Medicines.insured, Recipes.amount, 
    Recipes.delivered, Recipes.prepared, Recipes.comment
    FROM Recipes 
    INNER JOIN Medicines ON Recipes.medicine_id = Medicines.id 
    INNER JOIN Patients ON Recipes.patient_id = Patients.id 
    WHERE delivered = 0 AND prepared = 1
    ORDER BY date DESC";
} elseif (isset($_GET["page"]) && $_GET["page"] == "billing") {
    $query = "SELECT Recipes.id, Recipes.date, Patients.first_name, Medicines.name, Medicines.insured, Recipes.amount, 
    Recipes.delivered, Recipes.prepared, Recipes.comment
    FROM Recipes 
    INNER JOIN Medicines ON Recipes.medicine_id = Medicines.id 
    INNER JOIN Patients ON Recipes.patient_id = Patients.id 
    WHERE delivered = 1 AND billed = 0
    ORDER BY date DESC";
}
$db = DBConnection::getConnection();
$query = $db->prepare($query);
$query->execute();
$recipes = $query->fetchAll(PDO::FETCH_ASSOC);
