<main class="float-left">
    <p>Lorem Ipsum е елементарен примерен текст, използван в печатарската и типографската индустрия. Lorem Ipsum е индустриален стандарт от около 1500 година, когато неизвестен печатар взема няколко печатарски букви и ги разбърква, за да напечата с тях книга с примерни шрифтове. Този начин не само е оцелял повече от 5 века, но е навлязъл и в публикуването на електронни издания като е запазен почти без промяна. Популяризиран е през 60те години на 20ти век със издаването на Letraset листи, съдържащи Lorem Ipsum пасажи, популярен е и в наши дни във софтуер за печатни издания като Aldus PageMaker, който включва различни версии на Lorem Ipsum.</p>
    <?php

    $productsFile = file_get_contents("products.json");
    $productsArr = json_decode($productsFile, true);

    $counter = 1;
    $float = "";
    foreach ($productsArr as $key => $value) {
        if ($counter > 4) {
            break;
        }
        $title = $key;
        $price = $value["price"];
        $counter++;
        if ($counter % 2 == 0) {
            $float = "float-right";
        } else {
            $float = "float-left";
        }
        echo "<a href=\"?page=product\">
                <article class=\"article $float\">
                    <div>
                        <img class=\"image\" src=\"assets/images/square.png\" width=\"280\" height=\"250\">
                        <p  class=\"title-price\">$title</p>
                        <p  class=\"title-price\">$$price</p>
                    </div>
                </article>
              </a>";
    }
    ?>
    <h3 class="clear">Latest News</h3>
    <p class="clear">Lorem Ipsum е елементарен примерен текст, използван в печатарската и типографската индустрия. Lorem Ipsum е индустриален стандарт от около 1500 година, когато неизвестен печатар...<a class="link" href="news.php">Read More</a></p>
    <p class="clear">Lorem Ipsum е елементарен примерен текст, използван в печатарската и типографската индустрия. Lorem Ipsum е индустриален стандарт от около 1500 година, когато неизвестен печатар...<a class="link" href="news.php">Read More</a></p>
    <p class="clear">Lorem Ipsum е елементарен примерен текст, използван в печатарската и типографската индустрия. Lorem Ipsum е индустриален стандарт от около 1500 година, когато неизвестен печатар...<a class="link" href="news.php">Read More</a></p>
</main>