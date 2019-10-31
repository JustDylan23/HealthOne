<?php
require_once "api/Patient.php";
$patients = Patient::fetchAll($_POST["search"]);

require_once "global_components/success.php";
require_once "global_components/patient.search_bar.php";
?>

<div id="dtBasicExample" class="table-responsive">
    <table class="table table-striped table-hover table-bordered mt-4">
        <thead class="thead-dark">
        <tr>
            <th>#</th>
            <th>Voornaam</th>
            <th>Achternaam</th>
            <th></th>
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
                    $middleName = $patient->getMiddleName();
                    if ($middleName != null)
                        echo ", $middleName"
                    ?>
                </td>
                <td>
                    <a href="<?= $_SERVER["REQUEST_URI"] ?>&id=<?= $patient->getId(); ?>"
                       class='btn btn-primary btn-block btn-sm'>Wijzigen
                    </a>
                </td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
    <button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#patientAdd">
        <i class="fas fa-user-plus mr-3"></i>Toevoegen
    </button>
</div>
<div class="modal" id="patientAdd">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Patient toevoegen</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="" method="post" autocomplete="off">
                    <div class="form-group">
                        <label for="voornaam">Voornaam:</label>
                        <input
                                type="text"
                                class="form-control"
                                name="first_name"
                                required
                                placeholder="Piet"
                        >
                    </div>
                    <div class="form-group">
                        <label for="voorvoegsel">Voorvoegsel:</label>
                        <input
                                type="text"
                                class="form-control"
                                name="middle_name"
                                placeholder="van den"
                        >
                    </div>
                    <div class="form-group">
                        <label for="achternaam">Achternaam:</label>
                        <input
                                type="text"
                                class="form-control"
                                name="last_name"
                                required
                                placeholder="Burg"
                        >
                    </div>
                    <div class="form-group">
                        <label for="telefoonnummer">Telefoonnummer:</label>
                        <input
                                type="number"
                                class="form-control"
                                name="phone"
                                required
                                placeholder="06 1234 5678"
                        >
                    </div>
                    <div class="form-group">
                        <label for="geboorte datum">Geboorte datum:</label>
                        <input
                                type="date"
                                class="form-control"
                                name="birth_date"
                                required
                        >
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input
                                type="email"
                                class="form-control"
                                name="email"
                                placeholder="piet@email.com"
                        >
                    </div>
                    <div class="form-group">
                        <label for="adres">Adres:</label>
                        <input
                                type="text"
                                class="form-control"
                                name="street_and_number"
                                placeholder="Molenstraat 69"
                        >
                    </div>
                    <div class="form-group">
                        <label for="stad">Stad:</label>
                        <input
                                type="text"
                                class="form-control"
                                name="city"
                                required
                                placeholder="Amsterdam"
                        >
                    </div>
                    <div class="form-group">
                        <label for="rekeningnummer">Rekeningnummmer:</label>
                        <input
                                type="text"
                                class="form-control"
                                name="account_number"
                                required
                                placeholder="NL10 ABCD 1234 5678 90"
                        >
                    </div>
                    <button class="btn btn-primary btn-block" name="add" type="submit">Toevoegen</button>
                </form>
            </div>
        </div>
    </div>
</div>