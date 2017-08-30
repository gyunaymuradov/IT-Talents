<?php
require_once "header.php";
require_once "nav.php";
    if  (isset($_GET["page"])) {
        if ($_GET["page"] == "about_us") {
            require_once "about_us.php";
        } else if ($_GET["page"] == "contacts") {
            require_once "contacts.php";
        } else if ($_GET["page"] == "product") {
            require_once "product.php";
        } else if ($_GET["page"] == "catalog") {
            require_once "catalog.php";
        } else if ($_GET["page"] == "blog") {
            require_once "blog.php";
        }else if ($_GET["page"] == "news") {
            require_once "news.php";
        }
    } else {
        require_once "home.php";
    }

require_once "footer.php";
?>

