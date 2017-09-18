<?php

require_once '../../private/initialize.php';
require_once '../../private/shared/staff_header.php';

$admins = findAllAdmins();

?>

<div>
    <br>
    <h4><a href="../../public/staff/index.php">Menu</a></h4>
    <div id="create"><a href="create.php">Add new admin</a></div>
    <div>
    <table class="list">
        <tr>
            <th>ID</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Username</th>
            <th>Email</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
        </tr>

        <?php while($adminsSet = mysqli_fetch_assoc($admins)) { ?>
            <tr>
                <td><?php echo htmlEscape($adminsSet['id']); ?></td>
                <td><?php echo htmlEscape($adminsSet['first_name']); ?></td>
                <td><?php echo htmlEscape($adminsSet['last_name']); ?></td>
                <td><?php echo htmlEscape($adminsSet['username']); ?></td>
                <td><?php echo htmlEscape($adminsSet['email']); ?></td>
                <td><a href="<?php echo 'show.php?id=' . htmlEscape($adminsSet['id']); ?>">View</a></td>
                <td><a href="<?php echo 'edit.php?id=' . htmlEscape($adminsSet['id']); ?>">Edit</a></td>
                <td><a href="<?php echo 'delete.php?id=' . htmlEscape($adminsSet['id']); ?>">Delete</a></td>
            </tr>
        <?php } ?>

    </table>
</div>

<?php require_once '../../private/shared/staff_footer.php'; ?>