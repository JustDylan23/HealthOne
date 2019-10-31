<?php
require_once "api/Medicine.php";
$medicines = Medicine::fetchAll();
require_once "api/recipe/recipes_list_specific.php";
?>

<form action="action.php?name=edit_recipe" method="post" autocomplete="off">
    <input hidden name="id" value="<?= $_GET["id"] ?>">
    <div class="form-group">
        <label for="medicijn">Medicijn:</label>
        <select name="med_id" class="form-control" required>
            <?php foreach ($medicines as $medicine): ?>
                <option selected="selected" value="<?= $medicine->getId() ?>"><?= $medicine->getName() ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <?php forEach ($recipes as $recipe): ?>
        <div class="form-group">
            <label for="aantal">Aantal:</label>
            <input
                    class="form-control"
                    max="10"
                    min="1"
                    name="amount"
                    placeholder="Typ iets in.."
                    required
                    type="number"
                    value="<?= $recipe["amount"] ?>"
            >
        </div>
        <div class="form-group">
            <label for="commentaar">Commentaar:</label>
            <textarea
                    class="form-control"
                    maxlength="5000"
                    name="comment"
                    placeholder="Typ iets in.."
                    rows="6"
            ><?= $recipe["comment"] ?></textarea>
        </div>
    <?php endforeach ?>
    <div class="row">
        <div class="col-md-8">
            <input type="submit" name="opslaan" class="btn btn-primary btn-block" value="Opslaan"/>
        </div>
        <div class="col-md-4">
            <a class="btn btn-danger btn-block"
               href="index.php?view=pharmacist&page=pending&subpage=unprepared&id=<?= $_GET["id"] ?>">
                <i class="fas fa-sign-out-alt"></i>Terug</a>
        </div>
    </div>
</form>