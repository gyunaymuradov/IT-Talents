<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Add product</title>
    </head>
    <body>
        <nav>
            <div id="nav" class="float-left">
                <fieldset id="nav_fieldset">
                    <legend>Menu</legend>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="index.php?page=about_us">About Us</a></li>
                        <li><a href="index.php?page=contacts">Contacts</a></li>
                        <li><a href="index.php?page=catalog">Catalog</a></li>
                        <li><a href="index.php?page=blog">Blog</a></li>
                    </ul>
                </fieldset>
            </div>
        </nav>
        <main class="float-left">
            <div class="catalog">
                <div class="product-container">
                <?php
                if (!$logged) {
                    echo "<h3 class='error'>$errorMessage</h3>";
                } else {
                    echo "
                
                    <form action=\"\" enctype=\"multipart/form-data\" method=\"post\">
                        <label for=\"product-name\" class=\"product-label\">Product</label><br>
                        <input type=\"text\" id=\"product-name\" name=\"product\" class=\"product-input input-border\" required placeholder=\"Name\"><br>
                        <label for=\"description\" class=\"product-label\">Description</label><br>
                        <textarea name=\"description\" id=\"description\" cols=\"30\" rows=\"6\" class=\"product-input\"  required placeholder=\"More info for the product\"></textarea><br>
                        <label for=\"price\" class=\"product-label\">Price</label><br>
                        <input type=\"number\" name=\"price\" id=\"price\" class=\"product-input input-border\" required placeholder=\"Price in USD\"><br>
                        <label for=\"main_image\" class=\"product-label\">Main image</label><br>
                        <input type=\"file\" name=\"main_image\" id=\"main_image\" class=\"product-input\" required><br>
                        <label for=\"additional_images\" class=\"product-label\">Additional images</label><br>
                        <input type=\"file\" name=\"additional_images[]\" id=\"additional_images\" class=\"product-input\" multiple>
                        <hr><br>
                        <input type=\"submit\" name=\"add\" class=\"search\" value=\"Add Product\">
                    </form>";
                }
                ?>
                </div>
            </div>
        </main>
    </body>
</html>