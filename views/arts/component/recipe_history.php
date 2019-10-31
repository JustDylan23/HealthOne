<?php
require_once "api/recipe/recipes_list_specific.php";
require_once "api/Patient.php";
?>

<div class="jumbotron">
    <h1>
        Recepten geschiedenis -
        <?= Patient::getFullNameFromId($_GET["id"]) ?>
    </h1>
</div>
<div class="table-responsive">
    <table class="table table-striped table-hover table-bordered">
        <thead class="thead-dark">
        <tr>
            <th>Datum</th>
            <th>Medicijn</th>
            <th>Aantal</th>
            <th>Opmerking</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($recipes as $data) : ?>
            <tr>
                <td><?= $data["date"] ?></td>
                <td><?= $data["name"] ?></td>
                <td><?= $data["amount"] ?></td>
                <td><?= $data["comment"] ?></td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
    <?php if (count($recipes) == 0) : ?>
        <h1>Geen recepten gevonden</h1>
    <?php endif ?>
</div>