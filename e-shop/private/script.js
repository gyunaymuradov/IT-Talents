var currentPage = 1;
var orderType;
function changeOrder(order) {
    orderType = order;
    loadProducts(currentPage, orderType);
}
function nextPage() {
    if (currentPage < pagesCount) {
        currentPage++;
        loadProducts(currentPage, orderType);
    }
}

function previousPage() {
    if (currentPage > 1) {
        currentPage--;
        loadProducts(currentPage, orderType);
    }
}

function loadProducts(pageNumber = 1, orderType = "newest") {
    var request = new XMLHttpRequest();
    var url = 'http://localhost/e-shop/public/getProducts.php?page=' + pageNumber + '&order=' + orderType;
    var productsContainer = document.getElementById('products-list');
    productsContainer.innerHTML = "";
    request.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            var result = JSON.parse(request.responseText);
            result.products.forEach(function (product) {
                var prodHTML = '<a href=?page=product&id=' + product.id + '>';
                prodHTML += '<div class="products hvr-grow">';
                var image = product.image.substr(6);
                prodHTML += '<image src="' + image + '" width="auto" height="170" class="left">';
                prodHTML += '<div><h3 class="align-center"><strong>' + product.title + '</strong></h3><br>';
                prodHTML += '<h3 class="align-center"><strong>$ ' + product.price + '</strong></h3><br>';
                var description = product.description.substr(0, 195) + '...';
                prodHTML += '<p>' + description + '</p></div></div></a><br>';
                productsContainer.innerHTML += prodHTML;
            });
            pagesCount = result.pagesCount;
            currentPage = result.currentPage;
        }
    };
    request.open("GET", url);
    request.send();
}
loadProducts();