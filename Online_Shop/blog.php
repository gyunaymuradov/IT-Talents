<?php

$newsFile = file_get_contents("news.json");
$newsArr = json_decode($newsFile, true);

require_once "blog_view.php";
?>

