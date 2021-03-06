<main class="float-left">
    <div class="catalog border">
        <div class="sub-container">
            <form action="" method="post" class="float-left">
                <input id="search-input" name="search" type="text" placeholder="Search..." required>
                <input class="search" type="submit" name="submit_search" value="Search">
                <a href="addproduct.php" id="add-product">Add product</a>
            </form>
            <form action="" method="post" id="order" class="float-right">
                <select name="order_by" id="" class="float-right search">
                    <option value="name" <?php if ($orderSubmitted && $orderType == "name") echo 'selected="selected"'?>>Name</option>
                    <option value="ascending" <?php if ($orderSubmitted && $orderType == "ascending") echo 'selected="selected"'?>>Price ascending</option>
                    <option value="descending" <?php if ($orderSubmitted && $orderType == "descending") echo 'selected="selected"'?>>Price descending</option>
                </select>
                <input type="submit" name="order" value="Order by" class="float-right search">
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
            $image = $value["mainImg"];
            $description = substr($value["description"],0, 400) . "...";
            $counter++;

            echo "<a  href=\"?page=product&id=$id\">
             <div class=\"catalog border\">
                <div class=\"sub-container\">
                    <img class=\"float-left\" src=\"$image\" width=\"220\" height=\"auto\">
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
                if ($counter > 4) {
                    break;
                }

                $id = $value["id"];
                $title = $value["title"];
                $price = $value["price"];
                $image = $value["mainImg"];
                $description = substr($value["description"],0, 400) . "...";
                $counter++;

                echo "<a  href=\"?page=product&id=$id\">
                         <div class=\"catalog border\">
                            <div class=\"sub-container\">
                                <img class=\"float-left\" src=\"$image\" width=\"220\" height=\"auto\">
                                <div>
                                    <p class=\"title-price-cat\">$title</p>
                                    <p class=\"title-price-cat\">$$price</p>
                                </div>
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