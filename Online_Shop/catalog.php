<?php
$productsFile = "";
$productsArr = "";
$matchesArr = "";
$foundMatches = false;

if (isset($_POST["search"]) && isset($_POST["submit_search"])) {
    $productName = $_POST["search"];
    $productsFile = file_get_contents("products.json");
    $productsArr = json_decode($productsFile, true);

    $matchesArr = [];
    foreach ($productsArr as $key => $value) {
        $title = $key;
        if (strpos(strtolower($title), strtolower($productName)) !== false) {
            $foundMatches = true;
            $matchesArr[$title]["price"] = $value["price"];
            $matchesArr[$title]["description"] = $value["description"];
        }
    }

}

?>

<main class="float-left">
    <div class="catalog border">
        <div class="sub-container">
            <form action="" method="post">
                <input id="search" class="border" name="search" type="text" placeholder="Search..." required>
                <input class="border" type="submit" name="submit_search" value="Search">
                <select name="" id="" class="float-right border">
                    <option value="">Price ascending</option>
                    <option value="">Price descending</option>
                    <option value="">Date added</option>
                    <option value="">Name</option>
                </select>
                <p class="float-right">Order by</p>
            </form>
        </div>
    </div>
    <?php
    if ($foundMatches) {

        $counter = 1;
        foreach ($matchesArr as $key => $value) {
            if ($counter > 3) {
                break;
            }
            $title = $key;
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
        $productsFile = file_get_contents("products.json");
        $productsArr = json_decode($productsFile, true);

        $counter = 1;
        foreach ($productsArr as $key => $value) {
            if ($counter > 3) {
                break;
            }
            $title = $key;
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
    ?>

<!--    <div class="catalog border">-->
<!--        <div class="sub-container">-->
<!--            <img class="float-left" src="assets/images/square.png" width="150" height="170">-->
<!--            <p class="float-left product-title">Product Title</p>-->
<!--            <p class="float-right product-title">$100</p>-->
<!--            <p class="clear">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A ad assumenda dicta dignissimos dolor enim eveniet ex expedita harum minima molestiae molestias officiis omnis, quod saepe sapiente veniam veritatis vitae!</p>-->
<!--        </div>-->
<!--    </div>-->
<!--    <div class="catalog border">-->
<!--        <div class="sub-container">-->
<!--            <img class="float-left" src="assets/images/square.png" width="150" height="170">-->
<!--            <p class="float-left product-title">Product Title</p>-->
<!--            <p class="float-right product-title">$100</p>-->
<!--            <p class="clear">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A ad assumenda dicta dignissimos dolor enim eveniet ex expedita harum minima molestiae molestias officiis omnis, quod saepe sapiente veniam veritatis vitae!</p>-->
<!--        </div>-->
<!--    </div>-->
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