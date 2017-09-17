<?php require_once '../../private/initialize.php'?>


<?php require_once '../../private/shared/staff_header.php'; ?>



<div class="product new">
    <h1>Add Product</h1>


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
                <input type="file" required>
            </dd>
        </dl>
        <div id="operations">
            <input type="submit" value="Create Subject" />
        </div>
    </form>

</div>

<?php require_once '../../private/shared/staff_footer.php'; ?>

