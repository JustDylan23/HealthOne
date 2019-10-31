<?php
require_once "api/Medicine.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["delete"])) {
        $_SESSION['success-change'] = (Medicine::delete($_POST["delete"])) ? "Medicijn verwijderd" : false;
    } elseif (isset($_POST["save"])) {
        $_SESSION['success-change'] = Medicine::update(
            $_GET["id"],
            $_POST["name"],
            $_POST["price"],
            $_POST["insured"],
            $_POST["effects"],
            $_POST["side_effects"],
            $_POST["content"],
            $_POST["dosage"],
            $_POST["instructions"]
        ) ? "Medicijn aangepast" : false;

    }
    header("Location: index.php?view=insurance&page=medicines");
    exit();
}
$medicine = Medicine::get($_GET["id"]);
Common::checkExist($medicine);
?>
<form action="" method="post" autocomplete="off"
      id="medicine-form">
    <div class="form-group">
        <label for="name">Naam van het medicijn:</label>
        <input
                class="form-control"
                id="name"
                maxlength="255"
                name="name"
                placeholder="Naam"
                required
                type="text"
                value="<?= $medicine->getName() ?>"
        >
    </div>
    <div class="form-group">
        <label for="price">Prijs:</label>
        <input
                class="form-control"
                id="price"
                name="price"
                placeholder="1,00"
                required
                step=".01"
                type="number"
                value="<?= $medicine->getPrice() ?>"
        >
    </div>
    <div class="form-group">
        <label for="content">Inhoud:</label>
        <input
                class="form-control"
                id="content"
                maxlength="255"
                name="content"
                placeholder="100ml"
                required
                type="text"
                value="<?= $medicine->getContent() ?>"
        >
    </div>
    <div class="form-group">
        Verzekerd:
        <div class="form-check">
            <label class="form-check-label">
                <input class="form-check-input" name="insured" required type="radio" value="1"
                    <?php if ($medicine->isInsured()) echo "checked" ?>>Ja
            </label>
        </div>
        <div class="form-check">
            <label class="form-check-label">
                <input class="form-check-input" name="insured" required type="radio" value="0"
                    <?php if (!$medicine->isInsured()) echo "checked" ?>>Nee
            </label>
        </div>
    </div>
    <div class="form-group">
        <label for="effects">Effecten:</label>
        <textarea class="form-control" id="effects" maxlength="5000" name="effects" required
                  rows="10"><?= $medicine->getEffects() ?></textarea>
    </div>
    <div class="form-group">
        <label for="side_effects">Bijwerkingen:</label>
        <textarea class="form-control" id="side_effects" maxlength="5000" name="side_effects" required
                  rows="10"><?= $medicine->getSideEffects() ?></textarea>
    </div>
    <div class="form-group">
        <label for="dosage">Dosering:</label>
        <textarea class="form-control" id="dosage" maxlength="5000" name="dosage" required
                  rows="10"><?= $medicine->getDosage() ?></textarea>
    </div>
    <div class="form-group">
        <label for="instructions">Instructies:</label>
        <textarea class="form-control" id="instructions" maxlength="5000" name="instructions" required
                  rows="10"><?= $medicine->getInstructions() ?></textarea>
    </div>
    <button class="btn btn-primary btn-block" type="submit" name="save">Opslaan</button>
    <button class="btn btn-danger btn-block" data-toggle="modal"
            data-target="#patientDelete" type="button">Verwijder
    </button>
</form>

<form action="" method="post">
    <!-- Modal -->
    <div class="modal fade" id="patientDelete">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Weet u zeker dat u het medicijn wil verwijderen?</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal Header -->

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button class="btn btn-danger flex-fill" data-dismiss="modal" type="button">Nee</button>
                    <button class="btn btn-success flex-fill" name="delete" type="submit"
                            value="<?= $medicine->getId() ?>">
                        Ja
                    </button>
                </div>
                <!-- Modal Footer -->
            </div>
        </div>
    </div>
    <!-- Modal -->
</form>