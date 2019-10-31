<?php
if (empty($_GET['subpage'])) {
    exit(require_once "404.php");
}
require_once "api/recipe/recipes_list_specific.php";

require_once "api/Patient.php";
?>

<div class="container">
    <div class="row">
        <div class="col-md-3 mb-5">
            <ul class="nav nav-pills flex-column">
                <li class="nav-item">
                    <a class="nav-link <?= Common::isActive("subpage", "open") ?>"
                       href="index.php?view=pharmacist&page=patient&id=<?= $_GET['id'] ?>&subpage=open">Recepten in
                        afwachting</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= Common::isActive("subpage", "closed") ?>"
                       href="index.php?view=pharmacist&page=patient&id=<?= $_GET['id'] ?>&subpage=closed">Verwerkten
                        recepten</a>
                </li>
            </ul>
        </div>
        <div class="col-md-9 mb-5">
            <?php switch ($subpage) {
                case 'open':
                    require_once "views/apotheker/component/recipe/recipe_open.php";
                    break;
                case 'closed':
                    require_once "views/apotheker/component/recipe/recipe_closed.php";
                    break;
                default:
                    exit(require_once '404.php');
            } ?>
        </div>
    </div>
</div>