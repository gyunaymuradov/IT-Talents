<?php

$id = $_GET['id'];
$product = findProductById($id);
$title = $product['title'];
$price = $product['price'];
$description = $product['description'];
$image = substr($product['image'], 6);
$id = $product['id'];

?>

<main>
    <div class="main-content">
        <div class="content-container">
            <div id="single-product">
               <div class="left">
                   <img src="<?php echo $image; ?>" width="300" height="310" alt="">
               </div>
                <div class="center">
                    <h3><?php echo $title; ?></h3><br>
                    <h3>$ <?php echo $price; ?></h3><br>
                    <button>Add to basket</button>
                    <a href="?page=catalog"><button>View all products</button></a>
                </div>
                <div id="description">
                    <br>
                    <?php echo $description; ?>
                </div>
                <h3 id="gallery">Gallery</h3>
                <div class="more-images">
                <div class="addition-img"><img src="../private/images/square.png" alt="" width="220" height="220"></div>
                <div class="addition-img"><img src="../private/images/square.png" alt="" width="220" height="220"></div>
                <div class="addition-img"><img src="../private/images/square.png" alt="" width="220" height="220"></div>
                </div>
            </div>
        </div>
    </div>
</main>