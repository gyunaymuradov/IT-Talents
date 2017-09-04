<?php
$newId = $_GET["id"];

$newsFile = file_get_contents("news.json");
$newsArr = json_decode($newsFile, true);
$hasComments = false;

$newIndex = "";
foreach ($newsArr as $key => $new) {
    if ($newId == $new["id"]) {
        $newIndex = $key;
        $newTitle = $new["title"];
        $newAuthor = $new["author"];
        $newDescription = $new["description"];
        $newDate = $new["date"];
    }
}

$userLogged = false;
if ($_SESSION["logged"] == true) {
    $userLogged = true;
}

$commentsFile = file_get_contents("comments.json");
$commentsArr = json_decode($commentsFile, true);

if (isset($commentsArr[$newId])) {
    $hasComments = true;
}

require_once "news_view.php";
?>