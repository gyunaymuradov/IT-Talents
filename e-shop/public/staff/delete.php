<?php

require_once '../../private/initialize.php';
require_once '../../private/shared/staff_header.php';

if (!isset($_GET['id']) || $_GET['id'] == '') {
    redirectTo('products.php');
}

$id = $_GET['id'];
$product = '';
if (isPostRequest()) {

    $result = deleteProduct($id);
    redirectTo('products.php');

} else {
    $product = findProductById($id);
//    if (!$product) {
//        redirectTo('products.php');
//    }
}

?>

<div class="container">

    <p><a class="back-link" href="products.php">&laquo; Back</a></p>

    <div class="subject delete">
        <h1>Delete Product</h1>
        <p>Are you sure you want to delete this product?</p>
        <p ><?php echo htmlEscape($product['title']); ?></p>

        <form action="<?php echo "delete.php?id=" . htmlEscape($product['id']); ?>" method="post">
            <div>
                <input type="submit" name="commit" value="Delete Product" />
            </div>
        </form>
    </div>

</div>


<?php require_once '../../private/shared/staff_footer.php'; ?>
