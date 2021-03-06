<?php

require_once '../../../private/initialize.php';

requireLogin();

$pageTitle = "Products";

require_once '../../../private/shared/staff_header.php';


$productsSet = findAllProducts();

?>

<div>
    <br>
    <h4><a href="../../../public/staff/index.php">Menu</a></h4>
    <div id="products-nav">
        <div id="create"><a href="create.php">Add new product</a></div>
        <div id="archived"><a href="archived.php">See all archived products</a></div>
    </div>
    <div>
        <table>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Title</th>
                <th>Price</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>

            <?php while($product = $productsSet->fetch(PDO::FETCH_ASSOC)) {
                $img_src = htmlEscape($product['image']);?>

                <tr>
                    <td><?php echo htmlEscape($product['id']); ?></td>
                    <td><?php echo "<img src='$img_src'>"; ?></td>
                    <td><?php echo htmlEscape($product['title']); ?></td>
                    <td><?php echo "$ " . htmlEscape($product['price']); ?></td>
                    <td><a class="action" href="<?php echo 'show.php?id=' . htmlEscape($product['id']); ?>">View</a></td>
                    <td><a class="action" href="<?php echo 'edit.php?id=' . htmlEscape($product['id']); ?>">Edit</a></td>
                    <td><a class="action" href="<?php echo 'delete.php?id=' . htmlEscape($product['id']); ?>">Delete</a></td>
                </tr>

            <?php } ?>

        </table>
    </div>
</div>

<?php require_once '../../../private/shared/staff_footer.php'; ?>
