<div class="jumbotron">
    <h1>
        Verwerkte recepten -
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
        <?php foreach ($recipes as $recipe) : ?>
            <tr>
                <td><?= $recipe["date"] ?></td>
                <td><?= $recipe["name"] ?></td>
                <td><?= $recipe["amount"] ?></td>
                <td><?= $recipe["comment"] ?></td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
    <?php if (count($recipes) == 0) : ?>
        <h3>Geen afgeleverde recepten gevonden</h3>
    <?php endif ?>
</div>