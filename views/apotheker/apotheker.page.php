<?php
require_once "global_components/success.php";
if (empty($_GET['page'])) {
    exit(require_once "404.php");
}
$page = strtolower($_GET['page']);
?>
<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link <?= Common::isActive("page", "patient") ?>"
           href="index.php?view=pharmacist&page=patient">Zoek patiënten</a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?= Common::isActive("page", "workload") ?>"
           href="index.php?view=pharmacist&page=workload&subpage=unprepared">Alle recepten in afwachting</a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?= Common::isActive("page", "medicine") ?>"
           href="index.php?view=pharmacist&page=medicine">Medicijnen</a>
    </li>
</ul>
<br>
<?php
switch ($page) {
    case 'patient':
        if (filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT)) {
            require_once "views/apotheker/component/patient_specific.php";
        } else {
            require_once "views/apotheker/component/overview_patient.php";
        }
        break;
    case 'workload':
        require_once "views/apotheker/component/recipes.php";
        break;
    case 'medicine':
        require_once "global_components/medicine/view.php";
        break;
    default:
        require_once "404.php";
}
?>
