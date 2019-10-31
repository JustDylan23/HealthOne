<!-- Search Bar -->
<form method="post" action="" class="input-group mb-3">
    <input
            class="form-control"
            name="search"
            placeholder="Zoek..."
            type="text"
            value="<?= $_POST["search"] ?? "" ?>"
    >
    <div class="input-group-append">

        <!-- Clear Search Bar -->
        <?php if (!empty($_POST["search"])) : ?>
            <a class="btn btn-outline-light text-dark" style="border: 1px solid #ced4da"
               href="" role="button">
                <i class="fas fa-times-circle"></i></a>
        <?php endif ?>
        <!-- Clear Search Bar -->

        <!-- Search -->
        <button class="btn btn-success" type="submit">Zoek <i class="fas fa-search"></i></button>
        <!-- Search -->

        <!-- Amount of results -->
        <?php if (!empty($_POST["search"])) : ?>
            <button type="button" class="btn btn-info">
                Resultaten <span class="badge badge-light"><?= count($medicines) ?></span>
            </button>
        <?php endif ?>
        <!-- Amount of results -->

    </div>
</form>
<!-- Search Bar -->