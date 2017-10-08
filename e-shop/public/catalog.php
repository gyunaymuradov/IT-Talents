<main>
    <div class="main-content">
        <div class="content-container">
            <div id="search-order">
                <input type="text" id="search" onkeyup="searchProducts()" placeholder="search for product">&nbsp;&nbsp;
                Order by:
                <button onclick="changeOrder(this.value)" value="price_asc">Price asc</button>&nbsp;&nbsp;
                <button onclick="changeOrder(this.value)" value="price_desc">Price desc</button>&nbsp;&nbsp;
                <button onclick="changeOrder(this.value)" value="newest">Newest</button>&nbsp;&nbsp;
                <button onclick="changeOrder(this.value)" value="oldest">Oldest</button>&nbsp;&nbsp;
            </div>
            <br>
            <div id="products-list">
            </div>
            <div id="pagination">
                <button onclick="previousPage()" class="previous round">&#8249;&#8249; </button>
                <button onclick="nextPage()" class="next round"> &#8250;&#8250;</button>
            </div>
        </div>
        <script src="../private/script.js">
        </script>
    </div>
</main>