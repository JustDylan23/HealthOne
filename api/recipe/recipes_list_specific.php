<?php
$subpage = empty($_GET['subpage']) ? '' : $_GET['subpage'];

switch ($subpage) {
    case 'open':
        $query =
            'SELECT Recipes.date, Medicines.name, Recipes.amount, Recipes.comment, Recipes.id, Recipes.prepared
FROM Recipes 
INNER JOIN Medicines 
ON Recipes.medicine_id = Medicines.id
WHERE Recipes.patient_id = :id AND Recipes.delivered = 0
ORDER BY date DESC';
        break;
    case 'closed':
        $query = "SELECT Recipes.date, Medicines.name, Recipes.amount, Recipes.comment
FROM Recipes 
INNER JOIN Medicines 
ON Recipes.medicine_id = Medicines.id 
WHERE Recipes.patient_id = :id AND Recipes.delivered = 1
ORDER BY date DESC ";
        break;
    case 'unprepared':
        $query = 'SELECT Recipes.id, Recipes.date, Recipes.amount, Medicines.name, Recipes.comment, Recipes.prepared, 
Recipes.delivered, Recipes.billed
FROM Recipes 
INNER JOIN Medicines 
ON Recipes.medicine_id = Medicines.id
INNER JOIN Patients 
ON Recipes.patient_id = Patients.id
WHERE Recipes.id = :id
ORDER BY date';
        break;
    default:
        $query = 'SELECT Recipes.id, Recipes.date, Recipes.amount, Medicines.name, Recipes.comment, Recipes.prepared, 
Recipes.delivered, Recipes.billed
FROM Recipes 
INNER JOIN Medicines 
ON Recipes.medicine_id = Medicines.id
INNER JOIN Patients 
ON Recipes.patient_id = Patients.id
WHERE Recipes.patient_id = :id
ORDER BY date';
}
$db = DBConnection::getConnection();
$query = $db->prepare($query);
$query->bindParam('id', $_GET['id']);
$query->execute();
$recipes = $query->fetchAll(PDO::FETCH_ASSOC);
