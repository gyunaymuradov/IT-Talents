<?php

require_once '../../../private/initialize.php';

requireLogin();

$pageTitle = "Archived Products";

require_once '../../../private/shared/staff_header.php';


$archivedProductsSet = findAllArchivedProducts();

?>

    <div>
        <br>
        <h4><a href="../../../public/staff/index.php">Menu</a></h4>
        <div>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Archive Date</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                </tr>

                <?php while($product = $archivedProductsSet->fetch(PDO::FETCH_ASSOC)) {
                    $img_src = htmlEscape($product['image']);?>

                    <tr>
                        <td><?php echo htmlEscape($product['id']); ?></td>
                        <td><?php echo "<img src='$img_src'>"; ?></td>
                        <td><?php echo htmlEscape($product['title']); ?></td>
                        <td><?php echo "$ " . htmlEscape($product['price']); ?></td>
                        <td><?php echo htmlEscape($product['archive_date']); ?></td>
                        <td><a class="action" href="<?php echo 'show.php?id=' . htmlEscape($product['id']); ?>">View</a></td>
                        <td><a class="action" href="<?php echo 'edit.php?id=' . htmlEscape($product['id']); ?>">Edit</a></td>
                    </tr>

                <?php } ?>

            </table>
        </div>
    </div>

<?php require_once '../../../private/shared/staff_footer.php'; ?>