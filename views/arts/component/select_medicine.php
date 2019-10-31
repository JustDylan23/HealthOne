<?php
if (!filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT)) {
    exit(require_once "404.php");
}

require_once "api/Medicine.php";
$medicines = Medicine::fetchAll();

require_once "api/Patient.php";
?>

<form method="post" action="">
    <div class="form-group">
        <label for="sel">Aan:</label>
        <div class="input-group mb-3">
            <select disabled class="form-control" id="sel">
                <option><?= Patient::getFullNameFromId($_GET["id"]) ?></option>
            </select>
            <div class="input-group-append">
                <a href="index.php?view=doctor&page=patients" class="btn btn-outline-secondary" role="button">
                    Aanpassen <i class="fas fa-edit"></i>
                </a>
            </div>
        </div>
    </div>
    <input type="text" name="patient_id" hidden value="<?= $_GET["id"] ?>">
</form>

<?php require_once "global_components/medicine/search_bar.php" ?>

<!-- Table -->
<div class="table-responsive">
    <table class="table table-striped table-hover table-bordered mt-4">
        <thead class="thead-dark">
        <tr>
            <th>Naam</th>
            <th>Prijs</th>
            <th>Verzekerd</th>
            <th>Medicijn informatie</th>
            <th>Uitschrijven</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($medicines as $medicine) : ?>
            <tr>
                <td><?= $medicine->getName() ?></td>
                <td>&euro;<?= $medicine->getPrice() ?></td>
                <td><?= $medicine->isInsured() ? "ja" : "nee" ?></td>
                <td>
                    <a class='btn btn-info btn-block btn-sm'
                       href='index.php?view=doctor&page=medicines&med_id=<?= $medicine->getId() ?>'>Meer informatie</a>
                </td>
                <td>
                    <a class='btn btn-primary btn-block btn-sm'
                       href='index.php?view=doctor&page=prescribe&id=<?= $_GET["id"] ?>&med_id=<?= $medicine->getId() ?>'>Voorschrijven</a>
                </td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
</div>
<!-- Table -->
