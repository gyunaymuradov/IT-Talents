<?php
require_once('../../private/initialize.php');

$username = '';
$password = '';
$errors = [];

if(isPostRequest()) {

    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (isBlank($username)) {
        $errors[] = 'Username cannot be blank.';
    }

    if (isBlank($password)) {
        $errors[] = 'Password cannot be blank.';
    }

    // if no errors till now try to log in
    if (empty($errors)) {
        $failureMessage = 'Log in was unsuccessful.';
        $admin = findAdminByUsername($username);

        // if username exist check pass
        if ($admin) {
            if ($admin['password'] == $password) {
                //password matches
                logInAdmin($admin);
                redirectTo('index.php');
            }
            else
            {
                //username found, but password does not match
                $errors[] = $failureMessage;
            }
        // username is not found
        } else {
            $errors[] = $failureMessage;
        }
    }
}

$pageTitle = "Log In";

require_once '../../private/shared/staff_header.php';

?>

<div class="container">
    <h1>Log in</h1>
    <?php displayErrors($errors); ?>
    <form action="login.php" method="post">
        Username:<br>
        <input type="text" name="username" value="<?php echo htmlEscape($username); ?>"><br>
        Password:<br>
        <input type="password" name="password" value=""><br><hr>
        <input type="submit" name="submit" value="Log in">
    </form>

</div>

<?php require_once '../../private/shared/staff_footer.php'; ?>