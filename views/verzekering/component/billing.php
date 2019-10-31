<?php
require_once "global_components/success.php";
require_once "api/recipe/recipes_list.php";
?>
<div class="table-responsive">
    <table class="table table-striped table-hover table-bordered mt-4">
        <thead class="thead-dark">
        <tr>
            <th>Datum</th>
            <th>Patiënt</th>
            <th>Medicijn</th>
            <th>Aantal</th>
            <th>Opgehaald</th>
            <th>Factureren</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($recipes as $recipe) : ?>
            <tr>
                <td><?= $recipe["date"] ?></td>
                <td><?= $recipe["first_name"] ?></td>
                <td><?= $recipe["name"] ?></td>
                <td><?= $recipe["amount"] ?></td>
                <td><?= ($recipe["delivered"] == 1) ? "Ja" : "Nee" ?></td>
                <td>
                    <a href="action.php?name=pay_recipe&id=<?= $recipe["id"] ?>&medicin_insured=<?= $recipe["insured"] ?>"
                       class="btn btn-success btn-block text-left"
                    ><i class="fas fa-hand-holding-usd"></i> Factureren</a>
                </td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
    <?php if (count($recipes) == 0) : ?>
        <h1>Geen recepten gevonden</h1>
    <?php endif ?>
</div>