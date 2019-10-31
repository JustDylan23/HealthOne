<?php
require_once "api/Patient.php";
$patient = Patient::get($_GET['id']);
Common::checkExist($patient);
?>
<div class="container">
    <div class="row">
        <nav class="navbar flex-column flex-nowrap bg-light col-md-4">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <img src="img/profile.jpg" alt="profile" class="img-fluid img-thumbnail w-100">
                </li>
                <li class="nav-item my-4">
                    <a class="btn btn-info btn-block text-left"
                       href="index.php?view=insurance&page=history&id=<?= $patient->getId() ?>"><i
                                class="fas fa-history"></i> Bekijk recept
                        historie</a>
                </li>
                <li class="nav-item">
                    <button class="btn btn-primary btn-block text-left" data-toggle="modal" data-target="#patientEdit">
                        <i class="fas fa-edit"></i> Aanpassen
                    </button>
                </li>
                <li class="nav-item my-4">
                    <button class="btn btn-warning btn-block text-left" data-toggle="modal"
                            data-target="#patientDelete">
                        <i class="fas fa-user-minus"></i> Verwijder
                    </button>
                </li>
                <li class="nav-item">
                    <a class="btn btn-danger btn-block text-left"
                       href="index.php?view=insurance&page=users&subpage=patients">
                        <i class="fas fa-sign-out-alt"></i> Terug
                    </a>
                </li>
            </ul>
        </nav>
        <div class="col-md-8">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered">
                    <thead class="thead-dark">
                    <tr>
                        <th>Gegeven</th>
                        <th>Waarde</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>ID</td>
                        <td><?= $patient->getId() ?></td>
                    </tr>
                    <tr>
                        <td>Voornaam</td>
                        <td><?= $patient->getFirstName() ?></td>
                    </tr>
                    <tr>
                        <td>Achternaam</td>
                        <td>
                            <?php
                            echo $patient->getLastName();
                            $middleName = $patient->getMiddleName();
                            if ($middleName != null)
                                echo ", $middleName"
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Telefoon</td>
                        <td><?= $patient->getPhone() ?></td>
                    </tr>
                    <tr>
                        <td>Geboorte datum</td>
                        <td><?= $patient->getBirthDateFormatted() ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><?= $patient->getEmail() ?></td>
                    </tr>
                    <tr>
                        <td>Adres</td>
                        <td><?= $patient->getStreetAndNumber() ?></td>
                    </tr>
                    <tr>
                        <td>Stad</td>
                        <td><?= $patient->getCity() ?></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="patientEdit">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Patiënt wijzigen</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="" autocomplete="off"
                      method="post">
                    <input hidden name="id" type="text" value="<?= $patient->getId() ?>">
                    <div class="form-group">
                        <label for="voornaam">Voornaam:</label>
                        <input
                                class="form-control"
                                name="first_name"
                                placeholder="Typ iets in.."
                                required
                                type="text"
                                value="<?= $patient->getFirstName() ?>"
                        >
                    </div>
                    <div class="form-group">
                        <label for="voorvoegsel">Voorvoegsel:</label>
                        <input
                                class="form-control"
                                name="middle_name"
                                placeholder="Typ iets in.."
                                type="text"
                                value="<?= $patient->getMiddleName() ?>"
                        >
                    </div>
                    <div class="form-group">
                        <label for="achternaam">Achternaam:</label>
                        <input
                                class="form-control"
                                name="last_name"
                                placeholder="Typ iets in.."
                                required
                                type="text"
                                value="<?= $patient->getLastName() ?>"
                        >
                    </div>
                    <div class="form-group">
                        <label for="telefoonnummer">Telefoonnummer:</label>
                        <input
                                class="form-control"
                                name="phone"
                                placeholder="Typ iets in.."
                                required
                                type="text"
                                value="<?= $patient->getPhone() ?>"
                        >
                    </div>
                    <div class="form-group">
                        <label for="geboorte_datum">Geboorte datum:</label>
                        <input
                                class="form-control"
                                name="birth_date"
                                placeholder="Typ iets in.."
                                required
                                type="date"
                                value="<?= $patient->getBirthDate() ?>"
                        >
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input
                                class="form-control"
                                name="email"
                                placeholder="Typ iets in.."
                                required
                                type="email"
                                value="<?= $patient->getEmail() ?>"
                        >
                    </div>
                    <div class="form-group">
                        <label for="adres">Adres:</label>
                        <input
                                class="form-control"
                                name="street_and_number"
                                placeholder="Typ iets in.."
                                required
                                type="text"
                                value="<?= $patient->getStreetAndNumber() ?>"
                        >
                    </div>
                    <div class="form-group">
                        <label for="stad">Stad:</label>
                        <input
                                class="form-control"
                                name="city"
                                placeholder="Typ iets in.."
                                required
                                type="text"
                                value="<?= $patient->getCity() ?>"
                        >
                    </div>
                    <div class="form-group">
                        <label for="rekeningnummer">Rekeningnummer:</label>
                        <input
                                class="form-control"
                                name="account_number"
                                placeholder="Typ iets in.."
                                required
                                type="text"
                                value="<?= $patient->getAccountNumber() ?>"
                        >
                    </div>
                    <button class="btn btn-primary btn-block" type="submit" name="update">Opslaan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<form action="" method="post">
    <!-- The Modal -->
    <div class="modal fade" id="patientDelete">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Weet u zeker dat u de patient wil verwijderen?</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger flex-fill" data-dismiss="modal" type="button">Nee</button>
                    <button class="btn btn-success flex-fill" name="delete" value="<?= $patient->getId() ?>">Ja</button>
                </div>
            </div>
        </div>
    </div>
</form>