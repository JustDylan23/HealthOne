<?php
if (empty($_GET["page"])) {
    exit(require_once "404.php");
} else {
    $page = strtolower($_GET["page"]);
}
?>
<?php if ($page !== "history") : ?>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link <?= Common::isActive("page", "users") ?>"
               href="index.php?view=insurance&page=users&subpage=patients">Gebruikers beheren</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= Common::isActive("page", "medicines") ?>"
               href="index.php?view=insurance&page=medicines">Medicijnen beheren</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= Common::isActive("page", "billing") ?>"
               href="index.php?view=insurance&page=billing">Facturen</a>
        </li>
    </ul>
    <br>
<?php endif ?>
<?php
switch (strtolower($_GET["page"])) {
    case "medicines";
        require_once "views/verzekering/component/medicines.php";
        break;
    case "users";
        require_once "views/verzekering/component/users.php";
        break;
    case "billing":
        require_once "views/verzekering/component/billing.php";
        break;
    case "history":
        require_once "views/arts/component/recipe_history.php";
        break;
    default:
        exit(require_once "404.php");
}