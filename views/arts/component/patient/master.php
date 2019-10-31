<?php
require_once "api/Patient.php";
$patients = Patient::fetchAll($_POST["search"]);

require_once "global_components/success.php";

require_once "global_components/patient.search_bar.php";
?>
<!-- Table -->
<div class="table-responsive">
    <table class="table table-striped table-hover table-bordered mt-4">
        <thead class="thead-dark">
        <tr>
            <th>#</th>
            <th class="th-sm">Voornaam</th>
            <th class="th-sm">Achternaam</th>
            <th class="th-sm">Meer info</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($patients as $patient) : ?>
            <tr>
                <td><?= $patient->getId() ?></td>
                <td><?= $patient->getFirstName() ?></td>
                <td>
                    <?php
                    echo $patient->getLastName();
                    $temp = $patient->getMiddleName();
                    if ($temp != null)
                        echo ", $temp"
                    ?>
                </td>
                <td>
                    <a href="<?= $_SERVER['REQUEST_URI'] ?>&id=<?= $patient->getId() ?>"
                       class='btn btn-primary btn-block btn-sm'>Bekijken
                    </a>
                </td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
</div>
<!-- Table -->