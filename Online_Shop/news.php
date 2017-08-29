<?php
$newId = $_GET["id"];

$newsFile = file_get_contents("news.json");
$newsArr = json_decode($newsFile, true);

foreach ($newsArr as $new) {
    if ($newId == $new["id"]) {
        $newTitle = $new["title"];
        $newAuthor = $new["author"];
        $newDescription = $new["description"];
        $newDate = $new["date"];
    }
}

require_once "news_view.php";
?>