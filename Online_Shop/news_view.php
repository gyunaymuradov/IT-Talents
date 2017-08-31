<main class="float-left">
    <div class="catalog border">
        <div class="sub-container">
            <h2><?= $newTitle; ?></h2>
            <p class="news"><cite>Posted on: <?= $newDate; ?> by <?= $newAuthor; ?></cite></p>
            <img class="news-image" src="assets/images/169.jpg" width="100%" height="150">
            <p class="news"><?= $newDescription; ?></p><br>
            <a href="?page=blog"><button id="readNews">Read all news</button></a>
        </div>

        <?php
            if (!$hasComments) {
                echo "<div class='center'><small>This article does not have any comments yet! You can drop a comment below</small></div>";
            } else {
                echo "<fieldset class=\"sub-container\">
                    <legend>Comments</legend>
                    <div class='overflow'>";
                    foreach ($commentsArr[$newId] as $currentComment) {
                        $comment = $currentComment["comment"];
                        $author = $currentComment["author"];
                        $date = $currentComment["date"];
                        echo "<div>
                                <p>$author<cite> said on $date:</cite></p>
                                <div>$comment</div>
                                <br>
                              </div>";
                }
                echo "</fieldset>";
            }
        ?>

        <fieldset class="sub-container">
            <legend>Comment Yourself</legend>
            <div>
                <form action="addcomment.php" method="post">
                    <input type="hidden" name="current_id" value='<?= $newId; ?>'>
                    <label class="float-left" for="commentator_name">Name</label>
                    <input class="float-right" type="text" name="commentator" id="commentator_name" required><br><br>
                    <label class="float-left" for="comment">Comment</label>
                    <textarea class="float-right" name="comment_content" id="comment"></textarea><br>
                    <div id="align-right">
                        <input class="border" type="submit" name="comment" id="comment-btn" value="Comment">
                    </div>
                </form>
            </div>
        </fieldset>
    </div>
</main>