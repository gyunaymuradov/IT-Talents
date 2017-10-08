<?php

require_once '../private/public_functions.php';

$page = $_GET['page'] ?? 1;
$orderType = $_GET['order'];
$productsCountResult = getProductsCount();
$productsCount = $productsCountResult['count'];
$pagesCount = ceil($productsCount / 4);

if ($page > $pagesCount) {
    $page = $pagesCount;
} elseif  ($page <= 0) {
    $page = 1;
}

$offset = $page * 4 - 4;
$products = '';
if ($orderType == 'price_asc') {
    $products = getAllProductsOrderedByPriceAsc($offset);
} else if ($orderType == 'price_desc') {
    $products = getAllProductsOrderedByPriceDesc($offset);
} else if ($orderType == 'oldest') {
    $products = getAllProductsOrderedByIdAsc($offset);
} else {
    $products = getAllProducts($offset);
}

$response = [
    "products" => $products,
    "pagesCount" => $pagesCount,
    "currentPage" => $page
];

echo json_encode($response);