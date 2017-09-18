<?php

    require_once '../../private/initialize.php';

    $id = $_GET['id'] ?? '1';
    $product = findProductById($id);

    if (!$product) {
        redirectTo('products.php');
    }

?>

<?php require_once '../../private/shared/staff_header.php'; ?>

<div class="container">
    <br>
    <h4><a href="../../public/staff/index.php">Menu</a></h4>
    <ul>
        <li id="first_li"><a class="back-link" href="products.php">&laquo; Back</a></li>
        <li><a class="back-link" href="<?php echo "edit.php?id=" . htmlEscape($id); ?>">Edit</a></li>
        <li><a class="back-link" href="<?php echo "delete.php?id=" . htmlEscape($id); ?>">Delete</a></li>
    </ul>

    <div class="product">
        <div class="attributes">
            <dl>
                <dt>Product: </dt>
                <dd><?php echo "$ " . htmlEscape($product['title']); ?></dd>
            </dl>
            <dl>
                <dt>Price: </dt>
                <dd><?php echo "$ " . htmlEscape($product['price']); ?></dd>
            </dl>
            <dl>
                <dt>Description: </dt>
                <dd><?php echo htmlEscape($product['description']); ?></dd>
            </dl>
            <hr>
            <dl>
                <dt>Images: </dt>
                <dd><img src="<?php echo htmlEscape($product['image']); ?>" alt=""></dd>
                <dd><img src="" alt=""></dd>
                <dd><img src="" alt=""></dd>
                <dd><img src="" alt=""></dd>
            </dl>
        </div>
    </div>

</div>

<?php require_once '../../private/shared/staff_footer.php'; ?>
