<?php require_once '../../private/initialize.php'?>
<?php require_once '../../private/shared/staff_header.php'; ?>


<?php
    $productsSet = findAllProducts();

?>
    <img src="" alt="">
<div>
    <h4><a href="../../public/staff/index.php">Menu</a></h4>
    <div id="create"><a href="create.php">Add new product</a></div>
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

            <?php while($product = mysqli_fetch_assoc($productsSet)) {
                $img_src = $product['image'] ?>

                <tr>
                    <td><?php echo $product['id']; ?></td>
                    <td><?php echo "<img src='$img_src'>"; ?></td>
                    <td><?php echo $product['title']; ?></td>
                    <td><?php echo $product['price']; ?></td>
                    <td><a class="action" href="<?php echo 'show.php?id=' . $product['id']; ?>">View</a></td>
                    <td><a class="action" href="<?php echo 'edit.php?id=' . $product['id']; ?>">Edit</a></td>
                    <td><a class="action" href="<?php echo 'delete.php?id=' . $product['id']; ?>">Delete</a></td>
                </tr>

            <?php } ?>

        </table>
    </div>
</div>












<?php require_once '../../private/shared/staff_footer.php'; ?>
