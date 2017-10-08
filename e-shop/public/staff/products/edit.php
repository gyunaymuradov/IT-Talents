<?php

require_once '../../../private/initialize.php';

requireLogin();

$id = $_GET['id'];

if (!isset($_GET['id']) || $_GET['id'] == '') {
    redirectTo('index.php');
}

$existingProduct = findProductById($id);

if (!$existingProduct) {
    redirectTo('index.php');
}

if (isPostRequest()) {
    $product = [];
    $product['id'] = $id;
    $product['title'] = $_POST['title'] ?? '';
    $product['price'] = $_POST['price'] ?? '';
    $product['description'] = $_POST['description'] ?? '';

    if (!isset($_FILES['image']) || $_FILES['image']['size'] <= 0) {
        $product['image'] = $existingProduct['image'];
    } else {
        $imageTmpName = $_FILES['image']['tmp_name'];
        if (is_uploaded_file($imageTmpName)) {
            $imageRealName = $_FILES['image']['name'];

            $dir = '../../private/images/';
            $src = $dir . $imageRealName;

            move_uploaded_file($imageTmpName, $src);

            $product['image'] = $src;
        }
    }

    $result = updateProduct($product);
    if ($result['success'] == 1) {
        $newId = $result['updatedId'];
        redirectTo(getUrl('/staff/products/show.php?id=' . $newId));
    }
}

$pageTitle = "Edit Product";
require_once '../../../private/shared/staff_header.php';

?>


<div class="container">
    <h1>Edit Product</h1>

    <p><a class="back-link" href="index.php">&laquo; Back</a></p>
    <form action="" method="post" enctype="multipart/form-data">
        <dl>
            <dt>Product Title</dt>
            <dd>
                <input type="text" name="title" value="<?php echo htmlEscape($existingProduct['title'])?>" required>
            </dd>
        </dl>
        <dl>
            <dt>Price</dt>
            <dd>
                <input type="number" name="price" value="<?php echo htmlEscape($existingProduct['price'])?>" required>
            </dd>
        </dl>
        <dl>
            <dt>Description</dt>
            <dd>
                <textarea name="description" id="" cols="30" rows="10" required><?php echo htmlEscape($existingProduct['description'])?></textarea>
            </dd>
        </dl>
        <dl>
            <dt>Images</dt>
            <dd>
                <input type="file" name="image">
            </dd>
        </dl>
        <div id="operations">
            <input type="submit" value="Edit product" />
        </div>
    </form>

</div>


<?php require_once '../../../private/shared/staff_footer.php'; ?>



