<main>
    <div class="main-content">
        <div class="content-container">
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lorem Ipsum е елементарен примерен текст, използван в печатарската и типографската индустрия. Lorem Ipsum е индустриален стандарт от около 1500 година, когато неизвестен печатар взема няколко печатарски букви и ги разбърква, за да напечата с тях книга с примерни шрифтове. Този начин не само е оцелял повече от 5 века, но е навлязъл и в публикуването на електронни издания като е запазен почти без промяна. Популяризиран е през 60те години на 20ти век със издаването на Letraset листи, съдържащи Lorem Ipsum пасажи, популярен е и в наши дни във софтуер за печатни издания като Aldus PageMaker, който включва различни версии на Lorem Ipsum.</p>
            <br>
            <h4 id="homepage-title">
                Check out our freshly added products!
                <hr>
            </h4>
                <?php

                $products = getAllProducts();
                foreach($products as $product) {
                    $title = htmlEscape($product['title']);
                    $price = htmlEscape($product['price']);
                    $image = htmlEscape(substr($product['image'], 6));
                    $id = $product['id'];

                    echo "<div class=\"article-container left hvr-grow\">
                                <a href=\"?page=product&id=$id\">
                                    <div class='sub-container'>
                                        <article>
                                            <div>
                                                <img class=\"homepage-img\" width='200' height='210' src=\"$image\">
                                            </div>
                                            <p class=\"price-title\">$title</p><hr>
                                            <p class=\"price-title\">$$price</p>
                                            </div> 
                                        </article>
                                  </a> 
                         </div>";
                }
                ?>
        </div>
    </div>
</main>