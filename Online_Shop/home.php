<?php
$productsFile = file_get_contents("products.json");
$productsArr = json_decode($productsFile, true);

$float = "";

require_once "home_view.php";

?>