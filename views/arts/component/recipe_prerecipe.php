<?php
require_once "api/Medicine.php";

$medicine = Medicine::get($_GET["med_id"]);
Common::checkExist($medicine);

require_once "api/Patient.php";
?>

<div class="container">
    <form id="receptform" method="post" action="action.php?name=add_recipe">
        <input hidden name="id" value="<?= $_GET["id"] ?>">
        <input hidden name="med_id" value="<?= $_GET["med_id"] ?>">
        <div class="form-group">
            <label for="patient">Aan:</label>
            <input disabled class="form-control" value="<?= Patient::getFullNameFromId($_GET["id"]) ?>">
        </div>
        <div class="form-group">
            <label for="sel">Medicijn:</label>
            <div class="input-group mb-3">
                <input disabled class="form-control" value="<?= $medicine->getName() ?>">
                <div class="input-group-append">
                    <a href="index.php?view=doctor&page=medicine&id=<?= $_GET["id"] ?>"
                       class="btn btn-outline-secondary" role="button">
                        Aanpassen <i class="fas fa-edit"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Aantal:</label>
            <input class="form-control" max="10" min="1" name="amount" required type="number" value="1">
        </div>
        <div class="form-group">
            <label for="comment">Opmerkingen:</label>
            <textarea class="form-control" id="comment" name="comment" rows="5"></textarea>
        </div>
    </form>
    <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModal">
        Uitschrijven
    </button>
</div>

<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Weet u zeker dat u het recept wil uitschrijven?</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger flex-fill" data-dismiss="modal" type="button">Nee</button>
                <button class="btn btn-success flex-fill" data-target="#myModal" data-toggle="modal" form="receptform"
                        formmethod="post" type="submit">Ja
                </button>
            </div>
        </div>
    </div>
</div>