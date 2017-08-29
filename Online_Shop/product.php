<?php
    $productId = $_GET["id"];

    $productsFile = file_get_contents("products.json");
    $productsArr = json_decode($productsFile, true);

foreach ($productsArr as $item) {
        if ($productId == $item["id"]) {
            $productTitle = $item["title"];
            $productPrice = $item["price"];
            $productDescription = $item["description"];
        }
    }

    require_once "product_view.php";
?>
