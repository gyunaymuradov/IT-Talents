<main class="float-left">
    <?php
    $newsFile = file_get_contents("news.json");
    $newsArr = json_decode($newsFile, true);

    foreach ($newsArr as $currentNews) {
        $title = $currentNews["title"];
        $date = $currentNews["date"];
        $author = $currentNews["author"];
        $description = substr($currentNews["description"], 0, 351) . "...";

        echo "<a  href=\"?page=news\">
                <div class=\"catalog border\">
                    <div class=\"sub-container\">
                        <h2>$title</h2>
                        <p class=\"news\"><cite>Posted on: $date by $author</cite></p>
                        <p class=\"news\">$description</p>
                    </div>
                </div>
            </a>";
    }
    ?>
    
    <div class="pagination">
        <a href="#">&laquo;</a>
        <a class="active" href="#">1</a>
        <a href="#">2</a>
        <a href="#">3</a>
        <a href="#">4</a>
        <a href="#">5</a>
        <a href="#">6</a>
        <a href="#">&raquo;</a>
    </div>
</main>