<!doctype html>

<html lang="en">
    <head>
        <title><?php echo $pageTitle; ?></title>
        <meta charset="utf-8">
        <link rel="stylesheet" media="all" href="<?php echo getUrl('/stylesheets/staff_stylesheet.css'); ?>" type="text/css" />
    </head>
    <body>
        <header>
            <h2>E-SHOP Staff Area</h2>
        </header>

<?php if (isset($_SESSION['adminId'])) { ?>

    <div class="btn-container">
        <span>Admin: <?php echo $_SESSION['username']; ?></span>&nbsp;&nbsp;&nbsp;
        <span><a href="../../public/staff/logout.php">Logout</a></span>
    </div>

<?php } ?>