<?php
session_start();
if (empty($_GET["view"])) {
    require_once "views/home/home.page.php";
} else {
    switch (strtolower($_GET["view"])) {
        case "account":
            require_once "views/account/account.page.php";
            break;
        case "contact":
            require_once "views/contact/contact.page.html";
            break;
        case "register":
            require_once "register.php";
            break;
        case "doctor";
            require_once "views/arts/arts.page.php";
            break;
        case "pharmacist":
            require_once "views/apotheker/apotheker.page.php";
            break;
        case "insurance":
            require_once "views/verzekering/verzekering.page.php";
            break;
        default:
            require_once "404.php";
    }
}
