<?php
if (!empty($_GET["page"])) {
    switch (strtolower($_GET["page"])) {
        case "patients":
            require_once "views/arts/component/nav.php";
            if (filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT)) {
                require_once "views/arts/component/patient/detail.php";
            } else {
                require_once "views/arts/component/patient/master.php";
            }
            break;
        case "medicines":
            require_once "views/arts/component/nav.php";
            require_once "global_components/medicine/view.php";
            break;
        case "prescribe":
            if (filter_input(INPUT_GET, 'med_id', FILTER_VALIDATE_INT)) {
                require_once "views/arts/component/recipe_prerecipe.php";
            } else {
                require_once "views/arts/component/select_medicine.php";
            }
            break;
        case "history":
            require_once "views/arts/component/recipe_history.php";
            break;
        default:
            exit(require_once "404.php");
    }
}
