<main class="float-left product">
    <img class="float-left" id="product" src="assets/images/shop1.jpg" width="300" height="300">
    <div class="float-left">
        <p class="product-info"><?= $productTitle; ?></p>
        <p class="product-info">$<?= $productPrice; ?></p>
        <p class="product-info"><button id="buy">Buy now</button>
            <a href="?page=catalog"><button id="back-button">Back to all products</button></a></p>
    </div>
    <div class="product-description">
        <p><?= $productDescription; ?></p>
        <p id="gallery">Gallery</p>
        <div class="images">
            <img src="assets/images/square.png" width="220" height="220">
        </div>
        <div class="images">
            <img src="assets/images/square.png" width="220" height="220">
        </div>
        <div class="images">
            <img src="assets/images/square.png" width="220" height="220">
        </div>
    </div>
</main>