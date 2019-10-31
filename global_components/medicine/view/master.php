<?php
require_once "api/Medicine.php";
$medicines = Medicine::fetchAll($_POST["search"]);

require_once "global_components/medicine/search_bar.php";
?>

<!-- Table -->
<div class="table-responsive">
    <table class="table table-striped table-hover table-bordered mt-4">
        <thead class="thead-dark">
        <tr>
            <th>Naam</th>
            <th>Prijs</th>
            <th>Verzekerd</th>
            <th>Medicijn informatie</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($medicines as $medicine) : ?>
            <tr>
                <td><?= $medicine->getName() ?></td>
                <td>&euro;<?= $medicine->getPriceFormatted() ?></td>
                <td><?= $medicine->isInsured() ? "ja" : "nee" ?></td>
                <td><a class='btn btn-info btn-block btn-sm'
                       href='<?= $_SERVER['REQUEST_URI'] ?>&id=<?= $medicine->getId() ?>'>Meer
                        informatie</a></td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
</div>
<!-- Table -->
