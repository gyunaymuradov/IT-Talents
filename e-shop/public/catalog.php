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
                Order by:
                <button onclick="changeOrder(this.value)" value="price_asc">Price asc</button>&nbsp;&nbsp;
                <button onclick="changeOrder(this.value)" value="price_desc">Price desc</button>&nbsp;&nbsp;
                <button onclick="changeOrder(this.value)" value="newest">Newest</button>&nbsp;&nbsp;
                <button onclick="changeOrder(this.value)" value="oldest">Oldest</button>&nbsp;&nbsp;
            </div>
            <br>
            <div id="products-list">
                <?php
                foreach ($products as $product) {
                    $title = htmlEscape($product['title']);
                    $price = htmlEscape($product['price']);
                    $image = htmlEscape(substr($product['image'], 6));
                    $description = htmlEscape(mb_substr($product['description'], 0, 195) . "...");
                    $id = $product['id'];

                }
                    ?>
            </div>
            <div id="pagination">
                <button onclick="previousPage()" class="previous round">&#8249;&#8249; </button>
                <button onclick="nextPage()" class="next round"> &#8250;&#8250;</button>
            </div>
        </div>
        <script src="../private/script.js">
            loadProducts()
        </script>
    </div>
</main>