<?php
require_once "api/Patient.php";
$patient = Patient::get($_GET['id']);
?>

<div class="container">
    <div class="row">
        <nav class="navbar flex-column flex-nowrap bg-light col-md-4">
            <ul class="navbar-nav">
                <li class="nav-item mb-5">
                    <img src="img/profile.jpg" alt="profile" class="img-fluid img-thumbnail w-100">
                </li>
                <li class="nav-item">
                    <a href="index.php?view=doctor&page=prescribe&id=<?= $patient->getId() ?>"
                       class='btn btn-success btn-block text-left'>
                        <i class="fas fa-notes-medical"></i> Schrijf recept uit
                    </a>
                </li>
                <li class="nav-item my-4">
                    <a class="btn btn-info btn-block text-left"
                       href="index.php?view=doctor&page=history&id=<?= $patient->getId() ?>"><i
                                class="fas fa-history"></i> Bekijk recept
                        historie</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-danger btn-block text-left" href="<?= $_SERVER['HTTP_REFERER'] ?>"><i
                                class="fas fa-sign-out-alt"></i> Terug</a>
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
                        <td><?= $patient->getMiddleName() . " " . $patient->getLastName() ?></td>
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