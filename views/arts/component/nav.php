<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link <?= Common::isActive("page", "patients") ?>"
           href="index.php?view=doctor&page=patients" id="tab-1">Patiënten Overzicht</a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?= Common::isActive("page", "medicines") ?>"
           href="index.php?view=doctor&page=medicines" id="tab-2">Medicijnen Overzicht</a>
    </li>
</ul>
<br>