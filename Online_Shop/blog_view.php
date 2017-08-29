<main class="float-left">
    <?php
    foreach ($newsArr as $currentNews) {
        $id = $currentNews["id"];
        $title = $currentNews["title"];
        $date = $currentNews["date"];
        $author = $currentNews["author"];
        $description = substr($currentNews["description"], 0, 351) . "...";

        echo "<a href=\"?page=news&id=$id\">
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