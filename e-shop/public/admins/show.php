<?php

require_once '../../private/initialize.php';

$id = $_GET['id'] ?? '1';
$admin = findAdminById($id);

if (!$admin) {
    redirectTo('index.php');
}

require_once '../../private/shared/staff_header.php';

?>

<div class="container">
    <br>
    <h4><a href="../../public/staff/index.php">Menu</a></h4>
    <ul>
        <li id="first_li"><a class="back-link" href="index.php">&laquo; Back</a></li>
        <li><a class="back-link" href="<?php echo "edit.php?id=" . htmlEscape($id); ?>">Edit</a></li>
        <li><a class="back-link" href="<?php echo "delete.php?id=" . htmlEscape($id); ?>">Delete</a></li>
    </ul>

    <div class="product">
        <hr>
        <div class="attributes">
            <dl>
                <dt>Username: </dt>
                <dd><?php echo htmlEscape($admin['username']); ?></dd>
            </dl>
            <dl>
                <dt>First name: </dt>
                <dd><?php echo htmlEscape($admin['first_name']); ?></dd>
            </dl>
            <dl>
                <dt>Last name: </dt>
                <dd><?php echo htmlEscape($admin['last_name']); ?></dd>
            </dl>
            <dl>
                <dt>Email: </dt>
                <dd><?php echo htmlEscape($admin['email']); ?></dd>
            </dl>
        </div>
    </div>

</div>

<?php require_once '../../private/shared/staff_footer.php'; ?>