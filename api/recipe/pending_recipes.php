<?php
$db = DBConnection::getConnection();
$query = $db->prepare("SELECT * FROM Recipes WHERE delivered = 0 ORDER BY date DESC");
$query->execute();
$recipes = $query->fetchAll(PDO::FETCH_ASSOC);