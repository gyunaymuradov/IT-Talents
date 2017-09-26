<?php
require_once '../../private/initialize.php';

requireLogin();

$pageTitle = "Products";

require_once '../../private/shared/staff_header.php';

?>
    <fieldset>
        <legend>Menu</legend>
            <a href="products">Products</a>
            <a href="news">News</a>
            <a href="admins">Admins</a>
    </fieldset>

<?php require_once '../../private/shared/staff_footer.php'; ?>