<?php

require_once '../../private/initialize.php';

if (!isset($_GET['id']) || $_GET['id'] == '') {
    redirectTo('index.php');
}

$id = $_GET['id'];
$admin = '';

if (isPostRequest()) {

    $result = deleteAdmin($id);
    if ($result == 1){
        redirectTo('index.php');
    }

} else {
    $admin = findAdminById($id);
    if (!$admin) {
        redirectTo('index.php');
    }
}

$pageTitle = "Delete Admin";

require_once '../../private/shared/staff_header.php';

?>

<div class="container">

    <p><a class="back-link" href="index.php">&laquo; Back</a></p>

    <div class="subject delete">
        <h1>Delete Admin</h1>
        <p>Are you sure you want to remove this admin?</p>
        <p ><?php echo htmlEscape($admin['username']); ?></p>
        <form action="<?php echo "delete.php?id=" . $id; ?>" method="post">
            <div>
                <input type="submit" name="commit" value="Delete Admin" />
            </div>
        </form>
    </div>

</div>


<?php require_once '../../private/shared/staff_footer.php'; ?>
