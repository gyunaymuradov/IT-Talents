<?php

$productsCountResult = getProductsCount();
$productsCount = $productsCountResult['count'];
$pagesCount = ceil($productsCount / 4);
$page = '';

$page = $_GET['pageNumber'] ?? 1;

if ($page > $pagesCount) {
    $page = $pagesCount;
} elseif  ($page <= 0) {
    $page = 1;
}

$offset = $page * 4 - 4;
$products = getAllProducts($offset);

?>

<main>
    <div class="main-content">
        <div class="content-container">
            <div id="search-order">
                <input type="text" id="search" placeholder="search for product">&nbsp;&nbsp;
                Order by: <button id="">Price asc</button>&nbsp;&nbsp;
                <button>Price desc</button>&nbsp;&nbsp;
                <button>Name asc</button>
            </div>
            <br>
            <?php
            foreach ($products as $product) {
                $title = htmlEscape($product['title']);
                $price = htmlEscape($product['price']);
                $image = htmlEscape(substr($product['image'], 6));
                $description = htmlEscape(mb_substr($product['description'], 0, 195) . "...");
                $id = $product['id'];
                echo "<a href=\"?page=product&id=$id\">
                <div class=\"products hvr-grow\">
                    <image src=\"$image\" width=\"auto\" height=\"170\" class='left'>
                    <div>
                        <h3 class=\"align-center\"><strong>$title</strong></h3><br>
                        <h3 class=\"align-center\"><strong>$ $price</strong></h3><br>
                        <p>$description</p>
                    </div>
                </div>
            </a><br><br>";
            }
                ?>
            <div id="pagination">
                <a href="?page=catalog&pageNumber=<?php echo $page - 1; ?>" class="previous round">&#8249;&#8249; </a>
                <a href="?page=catalog&pageNumber=<?php echo $page + 1; ?>" class="next round"> &#8250;&#8250;</a>
            </div>
        </div>
    </div>
</main>