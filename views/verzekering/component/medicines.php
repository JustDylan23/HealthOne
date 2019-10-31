<?php
require_once "global_components/success.php";

if (filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT)) {
    require_once "views/verzekering/component/medicine/detail.php";
} else {
    require_once "views/verzekering/component/medicine/master.php";
}
