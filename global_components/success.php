<?php
if (isset($_SESSION['success-change'])) :?>
    <?php if ($_SESSION['success-change']) : ?>
        <div class="alert alert-success alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Succes!</strong>
            <?php
            echo ($_SESSION['success-change'] === true)
                ? "Succesvol veranderingen aangebracht"
                : $_SESSION['success-change']
            ?>
        </div>
    <?php endif ?>
    <?php if (!$_SESSION['success-change']) : ?>
        <div class="alert alert-danger alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Fout!</strong> Er is niks veranderd.
        </div>
    <?php endif ?>
    <?php unset($_SESSION['success-change']) ?>
<?php endif ?>