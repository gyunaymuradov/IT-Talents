<?php
$productsFile = "";
$productsArr = "";
$matchesArr = "";
$foundMatches = "";

// search for user input in all products
if (isset($_POST["search"]) && isset($_POST["submit_search"])) {
    $productName = $_POST["search"];
    $productsFile = file_get_contents("products.json");
    $productsArr = json_decode($productsFile, true);

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
$sortedProducts = "";
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
?>

<main class="float-left">
    <div class="catalog border">
        <div class="sub-container">
            <form action="" method="post" class="float-left">
                <input id="search" class="border" name="search" type="text" placeholder="Search..." required>
                <input class="border" type="submit" name="submit_search" value="Search">
            </form>
            <form action="" method="post" id="order" class="float-right">
                <select name="order_by" id="" class="float-right border">
                    <option value="ascending">Price ascending</option>
                    <option value="descending">Price descending</option>
                    <option value="name" selected >Name</option>
                </select>
                <input type="submit" name="order" value="Order by" class="float-right border">
            </form>
        </div>
    </div>
    <?php
    // print the found products
    if ($foundMatches) {
        $counter = 1;
        foreach ($matchesArr as $value) {
            if ($counter > 3) {
                break;
            }
            $title = $value["title"];
            $price = $value["price"];
            $description = substr($value["description"],0, 400) . "...";
            $counter++;

            echo "<a  href=\"?page=product\">
             <div class=\"catalog border\">
                <div class=\"sub-container\">
                    <img class=\"float-left\" src=\"assets/images/square.png\" width=\"150\" height=\"170\">
                    <p class=\"float-left product-title\">$title</p>
                    <p class=\"float-right product-title\">$$price</p>
                    <p class=\"clear\">$description</p>
                </div>
             </div>
         </a>";
        }
    } else {
        // display message if no occurrences are found
        if (isset($_POST["submit_search"])) {
            $product = $_POST["search"];
            echo "<div>No products with keyword '$product' were found. Please try with different keyword!</div>";
        } else {
            if ($orderSubmitted) {
                $productsArr = $sortedProducts;
            } else {
                $productsFile = file_get_contents("products.json");
                $productsArr = json_decode($productsFile, true);
            }
            // print all products
            $counter = 1;
            foreach ($productsArr as $value) {
                if ($counter > 3) {
                    break;
                }
                $title = $value["title"];
                $price = $value["price"];
                $description = substr($value["description"],0, 400) . "...";
                $counter++;

                echo "<a  href=\"?page=product\">
             <div class=\"catalog border\">
                <div class=\"sub-container\">
                    <img class=\"float-left\" src=\"assets/images/square.png\" width=\"150\" height=\"170\">
                    <p class=\"float-left product-title\">$title</p>
                    <p class=\"float-right product-title\">$$price</p>
                    <p class=\"clear\">$description</p>
                </div>
             </div>
         </a>";
            }
        }
    }
    ?>

    <div class="pagination">
        <a href="#">&laquo;</a>
        <a href="#">1</a>
        <a href="#">2</a>
        <a href="#">3</a>
        <a href="#">4</a>
        <a href="#">5</a>
        <a href="#">6</a>
        <a href="#">&raquo;</a>
    </div>
</main>