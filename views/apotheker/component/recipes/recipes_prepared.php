<?php
require_once "api/recipe/recipes_list.php";
?>

<div class="table-responsive">
    <table class="table table-striped table-hover table-bordered">
        <thead class="thead-dark">
        <tr>
            <th>Datum</th>
            <th>Medicijn</th>
            <th>Aantal</th>
            <th>Patient</th>
            <th>Bereid</th>
            <th>Onbereid</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($recipes as $data) : ?>
            <tr>
                <td><?= $data["date"] ?></td>
                <td><?= $data["name"] ?></td>
                <td><?= $data["amount"] ?></td>
                <td><?= $data["first_name"] ?></td>
                <td><?= ($data["prepared"] == 1) ? "Ja" : "Nee" ?></td>
                <td><a href="action.php?name=unprepare_recipe&id=<?= $data["id"] ?>" class="btn btn-danger btn-block"><i
                                class="fas fa-times"></i></a></td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
    <?php if (count($recipes) == 0) : ?>
        <h3>Geen openstaande recepten gevonden</h3>
    <?php endif ?>
</div>