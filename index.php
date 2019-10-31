<?php
require_once __DIR__ . "vendor/autoload.php"
?>
<!DOCTYPE html>
<html lang="nl">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">
        <link rel="icon" href="img/faveico.png">
        <?php require_once "global_components/bootstrap.html" ?>
        <title><?= "Health One - " . ((empty($_GET["view"])) ? "Home" : ucfirst(strtolower($_GET["view"]))) ?></title>
    </head>
    <body class="d-flex flex-column min-vh-100">
        <?php require_once "global_components/header.php" ?>
        <main role="main" class="flex-grow-1 container mt-3">
            <?php require_once "router.php" ?>
        </main>
        <?php require_once "global_components/footer.html" ?>
    </body>
</html>