<main class="float-left">
    <div class="catalog border">
        <div class="sub-container">
            <h2><?= $newTitle; ?></h2>
            <p class="news"><cite>Posted on: <?= $newDate; ?> by <?= $newAuthor; ?></cite></p>
            <img class="news-image" src="assets/images/169.jpg" width="100%" height="150">
            <p class="news"><?= $newDescription; ?></p>
        </div>
        <fieldset class="sub-container">
            <legend>Comments</legend>
            <div class="overflow">
                <p><cite>Someone said on 12.21.2121:</cite></p>
                <div class="comment-container">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore fugit maxime nulla placeat voluptate. Consequuntur debitis deleniti enim eum iste maxime mollitia obcaecati odit perspiciatis praesentium quisquam, repellat sit voluptate.</div>
                <div class="comment-container">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore fugit maxime nulla placeat voluptate. Consequuntur debitis deleniti enim eum iste maxime mollitia obcaecati odit perspiciatis praesentium quisquam, repellat sit voluptate.</div>
                <div class="comment-container">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore fugit maxime nulla placeat voluptate. Consequuntur debitis deleniti enim eum iste maxime mollitia obcaecati odit perspiciatis praesentium quisquam, repellat sit voluptate.</div>
            </div>
        </fieldset>
        <fieldset class="sub-container">
            <legend>Comment Yourself</legend>
            <div>
                <form action="" method="post">
                    <label class="float-left" for="commentator_name">Name</label>
                    <input class="float-right" type="text" id="commentator_name" required><br><br>
                    <label class="float-left" for="comment">Comment</label>
                    <textarea class="float-right" name="comment_content" id="comment"></textarea><br>
                    <div class="clear">
                        <input class="border" type="submit" name="comment" value="Comment">
                    </div>
                </form>
            </div>
        </fieldset>
    </div>
</main>