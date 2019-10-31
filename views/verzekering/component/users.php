<?php
require_once "api/Patient.php";
require_once "global_components/success.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["add"])) {
        $_SESSION['success-change'] = Patient::add(
            $_POST["first_name"],
            $_POST["middle_name"],
            $_POST["last_name"],
            $_POST["phone"],
            $_POST["birth_date"],
            $_POST["email"],
            $_POST["street_and_number"],
            $_POST["city"],
            $_POST["account_number"]
        ) ? "Patiënt toegevoegd" : false;

    } elseif (isset($_POST["update"])) {
        $_SESSION['success-change'] = Patient::update(
                $_GET["id"],
            $_POST["first_name"],
            $_POST["middle_name"],
            $_POST["last_name"],
            $_POST["phone"],
            $_POST["birth_date"],
            $_POST["email"],
            $_POST["street_and_number"],
            $_POST["city"],
            $_POST["account_number"]
        ) ? "Patiënt aangepast" : false;
    } elseif (isset($_POST["delete"])) {
        $_SESSION['success-change'] = Patient::delete($_POST["delete"]) ?
            "Patiënt verwijderd" : false;
    }
    header("Location: index.php?view=insurance&page=users&subpage=patients");
}
?>
<div class="container">
    <div class="row">
        <div class="col-md-3 mb-5">
            <ul class="nav nav-pills flex-column">
                <li class="nav-item"><?= Common::isActive("subpage", "")?>
                    <a class="nav-link <?= Common::isActive("subpage", "patients")?>"
                       href="index.php?view=insurance&page=users&subpage=patients">Patiënten</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= Common::isActive("subpage", "artsen")?>"
                       href="index.php?view=insurance&page=users&subpage=artsen">Artsen</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= Common::isActive("subpage", "apothekers")?>"
                       href="index.php?view=insurance&page=users&subpage=apothekers">Apothekers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= Common::isActive("subpage", "verzekeringsmedewerkers")?>"
                       href="index.php?view=insurance&page=users&subpage=verzekeringsmedewerkers">Verzekeringsmedewerkers</a>
                </li>
            </ul>
        </div>
        <div class="col-md-9 mb-5">
            <?php
            if (!empty($_GET["subpage"])) {
                switch (strtolower($_GET["subpage"])) {
                    case "patients":
                        if (filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT)) {
                            require_once "views/verzekering/component/patient/detail.php";
                        } else {
                            require_once "views/verzekering/component/patient/master.php";
                        }
                        break;
                    case "artsen":
                        require_once "views/verzekering/component/arts.php";
                        break;
                    case "apothekers":
                        require_once "views/verzekering/component/apothekers.php";
                        break;
                    case "verzekeringsmedewerkers":
                        require_once "views/verzekering/component/verzekeringsmedewerkers.php";
                        break;
                    default:
                        exit(require_once "404.php");
                }
            } else exit(require_once "404.php");
            ?>
        </div>
    </div>
</div>