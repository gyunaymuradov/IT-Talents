<?php

require_once '../../private/initialize.php';

if (!isset($_GET['id']) || $_GET['id'] == '') {
    redirectTo('index.php');
}

$id = $_GET['id'];

$existingAdmin = findAdminById($id);

if (!$existingAdmin) {
    redirectTo('index.php');
}

if (isPostRequest()) {
    $admin = [];
    $admin['id'] = $id;
    $admin['firstName'] = $_POST['firstName'] ?? '';
    $admin['lastName'] = $_POST['lastName'] ?? '';
    $admin['username'] = $_POST['username'] ?? '';
    $admin['email'] = $_POST['email'] ?? '';
    $admin['password'] = $_POST['password'] ?? '';
//    $admin['confirmPassword'] = $_POST['confirmPassword'] ?? '';

    $result = updateAdmin($admin);

    if ($result['affectedRows'] == 1) {
        $newId = $result['lastInsertId'];
        redirectTo('/e-shop/public/admins/show.php?id=' . $newId);
    }
}

$pageTitle = "Edit Admin";
require_once '../../private/shared/staff_header.php';

?>

<div class="container">
    <h1>Edit Admin</h1>

    <p><a class="back-link" href="index.php">&laquo; Back</a></p>
    <form action="create.php" method="post">
        <dl>
            <dt>First name</dt>
            <dd>
                <input type="text" name="firstName" value="<?php echo htmlEscape($existingAdmin['first_name'])?>" required>
            </dd>
        </dl>
        <dl>
            <dt>Last name</dt>
            <dd>
                <input type="text" name="lastName" value="<?php echo htmlEscape($existingAdmin['last_name'])?>" required>
            </dd>
        </dl>
        <dl>
            <dt>Username</dt>
            <dd>
                <input type="text" name="username" value="<?php echo htmlEscape($existingAdmin['username'])?>" required>
            </dd>
        </dl>
        <dl>
            <dt>Email</dt>
            <dd>
                <input type="text" name="email" value="<?php echo htmlEscape($existingAdmin['email'])?>" required>
            </dd>
        </dl>
        <dl>
            <dt>Password</dt>
            <dd>
                <input type="password" name="password" value="" required>
            </dd>
        </dl>
        <dl>
            <dt>Confirm password</dt>
            <dd>
                <input type="password" name="confirmPassword" value="" required>
            </dd>
        </dl>
        <small>
            Passwords should be at least 12 characters and include at least one uppercase letter, lowercase letter, number, and symbol.
        </small>
        <br> <hr>
        <div id="operations">
            <input type="submit" value="Update admin" />
        </div>
    </form>

</div>


<?php require_once '../../private/shared/staff_footer.php'; ?>



