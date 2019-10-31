<?php
require_once "api/Medicine.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add"])) {
    $_SESSION['success-change'] = Medicine::add(
        $_POST["name"],
        $_POST["price"],
        $_POST["insured"],
        $_POST["effects"],
        $_POST["side_effects"],
        $_POST["content"],
        $_POST["dosage"],
        $_POST["instructions"]
    ) ? "Medicijn toegevoegd" : false;

    header("Location: index.php?view=insurance&page=medicines");
    exit();
}

$medicines = Medicine::fetchAll($_POST["search"]);

require_once "global_components/medicine/search_bar.php";
require_once "global_components/success.php"
?>

<!-- Table -->
<div class="table-responsive">
    <table class="table table-striped table-hover table-bordered mt-4">
        <thead class="thead-dark">
        <tr>
            <th>Naam</th>
            <th>Prijs</th>
            <th>Verzekerd</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($medicines as $medicine) : ?>
            <tr>
                <td class="text-capitalize"><?= $medicine->getName() ?></td>
                <td>&euro;<?= $medicine->getPriceFormatted() ?></td>
                <td><?= ($medicine->isInsured()) ? "ja" : "nee" ?></td>
                <td><a class='btn btn-primary btn-block btn-sm'
                       href='<?= $_SERVER['REQUEST_URI'] ?>&id=<?= $medicine->getId() ?>'>
                        Wijzigen
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
</div>
<!-- Table -->

<button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#patientAdd">
    <i class="fas fa-user-plus mr-3"></i>Toevoegen
</button>

<div class="modal" id="patientAdd">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Medicijn toevoegen</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="" method="post" autocomplete="off">
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
                        >
                    </div>
                    <div class="form-group">
                        Verzekerd:
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" name="insured" required type="radio" value="1">Ja
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input checked class="form-check-input" name="insured" required type="radio" value="0">Nee
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="effects">Effecten:</label>
                        <textarea class="form-control" id="effects" maxlength="5000" name="effects" required
                                  rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="instructions">Instructies:</label>
                        <textarea class="form-control" id="instructions" maxlength="5000" name="instructions" required
                                  rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="dosage">Dosering:</label>
                        <textarea class="form-control" id="dosage" maxlength="5000" name="dosage" required
                                  rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="side_effects">Bijwerkingen:</label>
                        <textarea class="form-control" id="side_effects" maxlength="5000" name="side_effects" required
                                  rows="3"></textarea>
                    </div>
                    <button class="btn btn-primary btn-block" name="add" type="submit">Toevoegen</button>
                </form>
            </div>
        </div>
    </div>
</div>
