<?php

require_once '../../../private/initialize.php';

requireLogin();

$pageTitle = "Past Admins";

require_once '../../../private/shared/staff_header.php';


$pastAdminsSet = findAllPastAdmins();

?>

    <div>
        <br>
        <h4><a href="../../../public/staff/index.php">Menu</a></h4>
        <div>
            <table class="list">
                <tr>
                    <th>ID</th>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Not an admin since</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                </tr>

                <?php while($admin = $pastAdminsSet->fetch(PDO::FETCH_ASSOC)) { ?>
                    <tr>
                        <td><?php echo htmlEscape($admin['id']); ?></td>
                        <td><?php echo htmlEscape($admin['first_name']); ?></td>
                        <td><?php echo htmlEscape($admin['last_name']); ?></td>
                        <td><?php echo htmlEscape($admin['username']); ?></td>
                        <td><?php echo htmlEscape($admin['email']); ?></td>
                        <td><?php echo htmlEscape($admin['archive_date']); ?></td>
                        <td><a href="<?php echo 'show.php?id=' . htmlEscape($admin['id']); ?>">View</a></td>
                        <td><a href="<?php echo 'edit.php?id=' . htmlEscape($admin['id']); ?>">Edit</a></td>
                    </tr>
                <?php } ?>

            </table>
        </div>
    </div>

<?php require_once '../../../private/shared/staff_footer.php'; ?>