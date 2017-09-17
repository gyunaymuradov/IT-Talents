<?php require_once '../../private/initialize.php'?>

<?php
    $id = $_GET['id'] ?? '1';
?>

<?php require_once '../../private/shared/staff_header.php'; ?>

<div><br>
    <h4><a href="../../public/staff/index.php">Menu</a></h4>
    <ul>
        <li id="first_li"><a class="back-link" href="products.php">&laquo; Back</a></li>
        <li><a class="back-link" href="edit.php">Edit</a></li>
        <li><a class="back-link" href="delete.php">Delete</a></li>
    </ul>

    <div class="subject show">

        <h1>Product: <?php  ?></h1>

        <div class="attributes">
            <dl>
                <dt>Price: </dt>
                <dd><?php  ?></dd>
            </dl>
            <dl>
                <dt>Description: </dt>
                <dd><?php  ?></dd>
            </dl>
            <hr>
            <dl>
                <dt>Images: </dt>
                <dd><img src="" alt=""></dd>
                <dd><img src="" alt=""></dd>
                <dd><img src="" alt=""></dd>
                <dd><img src="" alt=""></dd>
            </dl>
        </div>
    </div>

</div>

<?php require_once '../../private/shared/staff_footer.php'; ?>
