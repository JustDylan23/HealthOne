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
            <th>Aanpassen</th>
            <th>Commentaar</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($recipes as $recipe) : ?>
            <tr>
                <td><?= $recipe["date"] ?></td>
                <td><?= $recipe["name"] ?></td>
                <td><?= $recipe["amount"] ?></td>
                <td><?= $recipe["first_name"] ?></td>
                <td><a href="action.php?name=prepare_recipe&id=<?= $recipe["id"] ?>"
                       class="btn btn-success btn-block"><i
                                class="fas fa-check"></i></a></td>
                <td><a href="<?= "{$_SERVER['REQUEST_URI']}&id={$recipe["id"]}" ?>"
                       class="btn btn-primary btn-block">Aanpassen</a></td>
                <td>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modal_<?= $recipe["id"] ?>">
                        Commentaar <span class="badge badge-light"><?= empty($recipe["comment"]) ? 0 : 1 ?></span>
                    </button>
                    <?php if (!empty($recipe["comment"])): ?>
                        <div class="modal fade" id="modal_<?= $recipe["id"] ?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Recept commentaar</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <?= $recipe["comment"] ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif ?>
                </td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
    <?php if (count($recipes) == 0) : ?>
        <h3>Geen openstaande recepten gevonden</h3>
    <?php endif ?>
</div>