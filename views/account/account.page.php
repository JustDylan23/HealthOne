<div class="container">
    <div class="jumbotron">
        <h1>
            Account gegevens
        </h1>
    </div>
    <?php
        if (!empty($_GET["page"])) {
            $page = $_GET["page"];

            switch ($page) {
                case "info":
                    require`_once "views/account/component/info.page.php";
                    break;
                case "edit":
                    require`_once "views/account/component/edit.page.php";
                    break;
                default:
                    exit(require`_once "404.html");
            }
        } else exit(require`_once "404.html");
    ?>
</div>
