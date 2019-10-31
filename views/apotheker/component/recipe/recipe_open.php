<div class="jumbotron">
    <h1>
        Openstaande recepten -
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
            <th>Afhandelen</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($recipes as $recipe) : ?>
            <tr>
                <td><?= $recipe["date"] ?></td>
                <td><?= $recipe["name"] ?></td>
                <td><?= $recipe["amount"] ?></td>
                <td><?= $recipe["comment"] ?></td>
                <td>
                    <a href="action.php?name=conclude_recipe&id=<?= $_GET["id"] ?>&recipe_id=<?= $recipe["id"] ?>"
                       class="btn btn-primary btn-block"
                    ><i class="fas fa-handshake"></i> Afhandelen</a>
                </td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
    <?php if (count($recipes) == 0) : ?>
        <h3>Geen openstaande recepten gevonden</h3>
    <?php endif ?>
</div>