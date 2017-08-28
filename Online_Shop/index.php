<?php
    include "header.php";
    include "nav.php";

    if  (isset($_GET["page"])) {
        if ($_GET["page"] == "about_us") {
            include "about_us.php";
        } else if ($_GET["page"] == "contacts") {
            include "contacts.php";
        } else if ($_GET["page"] == "product") {
            include "product.php";
        } else if ($_GET["page"] == "catalog") {
            include "catalog.php";
        } else if ($_GET["page"] == "blog") {
            include "blog.php";
        }
    } else {
        include "home.php";
    }

    include "footer.php";
?>

