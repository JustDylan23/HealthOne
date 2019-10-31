<?php
require_once "api/Medicine.php";
$medicine = Medicine::get($_GET['id']);
Common::checkExist($medicine);
?>
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
        <tr>
            <th>Gegeven</th>
            <th>Waarde</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Naam</td>
            <td><?= $medicine->getName() ?></td>
        </tr>
        <tr>
            <td>Prijs</td>
            <td>&euro;<?= $medicine->getPrice() ?></td>
        </tr>
        <tr>
            <td>Inhoud</td>
            <td><?= $medicine->getContent() ?></td>
        </tr>
        <tr>
            <td>Verzekerd</td>
            <td><?= $medicine->isInsured() ? 'ja' : 'nee' ?></td>
        </tr>
        <tr>
            <td>Effecten</td>
            <td>
                <span style="white-space: pre-line"><?= $medicine->getEffects() ?></span>
            </td>
        </tr>
        <tr>
            <td>Instructies</td>
            <td>
                <span style="white-space: pre-line"><?= $medicine->getInstructions() ?></span>
            </td>
        </tr>
        <tr>
            <td>Dosering</td>
            <td>
                <span style="white-space: pre-line"><?= $medicine->getDosage() ?></span>
            </td>
        </tr>
        <tr>
            <td>Bijwerkingen</td>
            <td>
                <span style="white-space: pre-line"><?= $medicine->getSideEffects() ?></span>
            </td>
        </tr>
        </tbody>
    </table>
</div>