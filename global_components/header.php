<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-warning sticky-top">
        <a class="navbar-brand" href="index.php">
            <img src="img/banner.png" alt="banner">
        </a>
        <button class="navbar-toggler navbar-toggler-right collapsed" type="button" data-toggle="collapse"
                data-target="#navb" aria-expanded="false">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse collapse" id="navb">
            <ul class="navbar-nav navbar-pils mr-auto">
                <li class="nav-item">
                    <a class="nav-link <?= Common::isActive("view", "default") ?>" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= Common::isActive("view", "contact") ?>"
                       href="index.php?view=contact">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= Common::isActive("view", "register") ?>"
                       href="index.php?view=register">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= Common::isActive("view", "doctor") ?>"
                       href="index.php?view=doctor&page=patients">Arts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= Common::isActive("view", "pharmacist") ?>"
                       href="index.php?view=pharmacist&page=patient">Apotheker</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= Common::isActive("view", "insurance") ?>"
                       href="index.php?view=insurance&page=users&subpage=patients">Verzekeringsmedewerker</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item active mr-2">
                    <a href="index.php?view=account&page=info" class="btn btn-info">
                        <i class="fas fa-user-circle"></i> Account
                    </a>
                </li>
                <li class="nav-item active">
                    <button class="btn btn-success disabled">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </li>
            </ul>
        </div>
    </nav>
</header>