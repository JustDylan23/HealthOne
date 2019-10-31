<?php
if (filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT)) {
    require_once "global_components/medicine/view/detail.php";
} else {
    require_once "global_components/medicine/view/master.php";
}
