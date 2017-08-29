<?php
$productsFile = file_get_contents("products.json");
$productsArr = json_decode($productsFile, true);

$newsFile = file_get_contents("news.json");
$newsArr = json_decode($newsFile, true);

$float = "";

require_once "home_view.php";

?>