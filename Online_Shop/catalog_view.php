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
            $id = $value["id"];
            $title = $value["title"];
            $price = $value["price"];
            $description = substr($value["description"],0, 400) . "...";
            $counter++;

            echo "<a  href=\"?page=product&id=$id\">
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
            }
            // print all products
            $counter = 1;
            foreach ($productsArr as $value) {
                if ($counter > 3) {
                    break;
                }

                $id = $value["id"];
                $title = $value["title"];
                $price = $value["price"];
                $description = substr($value["description"],0, 400) . "...";
                $counter++;

                echo "<a  href=\"?page=product&id=$id\">
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