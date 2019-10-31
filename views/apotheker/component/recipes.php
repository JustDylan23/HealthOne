<?php
$param = "subpage";
$default = "unprepared";

if (empty($_GET[$param])) {
    header("Location: {$_SERVER['REQUEST_URI']}&$param=$default");
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-3 mb-5">
            <ul class="nav nav-pills flex-column">
                <li class="nav-item">
                    <a class="nav-link <?= Common::isActive($param, $default) ?>"
                       href="<?= Common::linkSameParent($param, $default) ?>">Onbereide recepten</a>
                </li>
                <?php $page = "prepared" ?>
                <li class="nav-item">
                    <a class="nav-link <?= Common::isActive($param, $page) ?>"
                       href="<?= Common::linkSameParent($param, $page) ?>">Bereide recepten</a>
                </li>
            </ul>
        </div>
        <div class="col-md-9 mb-5">
            <?php
            switch (strtolower($_GET[$param])) {
                case "unprepared":
                    if (filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT)) {
                        require_once "views/apotheker/component/recipe/recipe_edit.php";
                    } else {
                        require_once "views/apotheker/component/recipes/recipes_unprepared.php";
                    }
                    break;
                case "prepared":
                    require_once "views/apotheker/component/recipes/recipes_prepared.php";
                    break;
                default:
                    exit(require_once "404.php");
            }
            ?>
        </div>
    </div>
</div>