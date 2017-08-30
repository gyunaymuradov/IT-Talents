<?php
$matchesArr = "";
$foundMatches = "";

$productsFile = file_get_contents("products.json");
$productsArr = json_decode($productsFile, true);

// search for user input in all products
if (isset($_POST["search"]) && isset($_POST["submit_search"])) {
    $productName = $_POST["search"];

    $matchesArr = [];
    foreach ($productsArr as $value) {
        $title = $value["title"];
        if (strpos(strtolower($title), strtolower($productName)) !== false) {
            $foundMatches = true;
            $matchesArr[] = $value;
        }
    }

}
// order the products if order by is submitted
$orderSubmitted = false;

usort($productsArr, function ($a, $b) {
    return strcmp($a["title"], $b["title"]);
}) ;

if (isset($_POST["order"])) {
    $orderSubmitted = true;
    $productsFile = file_get_contents("products.json");
    $sortedProducts = json_decode($productsFile, true);
    $orderType = $_POST["order_by"];
    if ($orderType == "ascending") {
        usort($sortedProducts, function ($a, $b) {
            return $a["price"] - $b["price"];
        });
    } else if ($orderType == "name") {
        usort($sortedProducts, function ($a, $b) {
            return strcmp($a["title"], $b["title"]);
        }) ;
    } else if ($orderType == "descending") {
        usort($sortedProducts, function ($a, $b) {
            return $b["price"] - $a["price"];
        });
    }
}

require_once "catalog_view.php";
?>

