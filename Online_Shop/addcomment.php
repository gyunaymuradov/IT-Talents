<?php

if (isset($_POST["commentator"]) && isset($_POST["comment_content"]) && isset($_POST["comment"])) {
    $commentatorName = $_POST["commentator"];
    $comment = $_POST["comment_content"];
    date_default_timezone_set("Europe/Berlin");
    $date = date('d-m-Y');
    $newId = $_POST["current_id"];
    $commentsFile = file_get_contents("comments.json");
    $commentsArr = json_decode($commentsFile, true);

    $commentsArr[$newId][] = array("author" => $commentatorName, "comment" => $comment, "date" => $date);
    file_put_contents("comments.json", json_encode($commentsArr));

    header("Location:index.php?page=news&id=$newId");
}
?>