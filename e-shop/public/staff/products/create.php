<?php

require_once '../../../private/initialize.php';

if (isPostRequest()) {
    $product = [];
    $product['title'] = $_POST['title'] ?? '';
    $product['price'] = $_POST['price'] ?? '';
    $product['description'] = $_POST['description'] ?? '';
    $imageTmpName = $_FILES['image']['tmp_name'];
    $product['archived'] = 0;
    $product['archiveDate'] = null;

    if (is_uploaded_file($imageTmpName)) {
        $imageRealName = $_FILES['image']['name'];

        $dir = '../../../private/images/';
        $src = $dir . $imageRealName;

        move_uploaded_file($imageTmpName, $src);

        $product['image'] = $src;

        $result = insertProduct($product);

        if ($result['success']) {
            $newId = $result['lastInsertId'];
            redirectTo('/e-shop/public/staff/products/show.php?id=' . $newId);
        }
    }
}

$pageTitle = "Add Product";

require_once '../../../private/shared/staff_header.php';

?>


<div class="container">
    <h1>Add Product</h1>

    <p><a class="back-link" href="index.php">&laquo; Back</a></p>
    <form action="create.php" method="post" enctype="multipart/form-data">
        <dl>
            <dt>Product Title</dt>
            <dd>
                <input type="text" name="title" value="" required>
            </dd>
        </dl>
        <dl>
            <dt>Price</dt>
            <dd>
                <input type="number" name="price" value="" required>
            </dd>
        </dl>
        <dl>
            <dt>Description</dt>
            <dd>
                <textarea name="description" id="" cols="30" rows="10" required></textarea>
            </dd>
        </dl>
        <dl>
            <dt>Images</dt>
            <dd>
                <input type="file" name="image" required>
            </dd>
        </dl>
        <div id="operations">
            <input type="submit" value="Add product" />
        </div>
    </form>

</div>

<?php require_once '../../../private/shared/staff_footer.php'; ?>

