<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-shop</title>
    <link rel="stylesheet" href="<?php echo getUrl('/stylesheets/public_stylesheet.css'); ?>" type="text/css">
</head>
<body>
    <div id="main-container">
        <header>
             <?php
                 if (!isset($_SESSION["logged"]) || $_SESSION["logged"] == false) {
                     echo "<div class='login-info'>You are not logged in. <a class='underline' href='login.php'>(Log in)</a></div>";
                 } else {
                     $username = $_SESSION["username"];
                     echo "<form action='login.php' method='post'>
                        <div class='login-info'>Welcome back, <span class='underline'>$username</span> &nbsp;
                            <input type='submit' name='logout' value='Logout'>
                        </div>
                     </form>";
        }
            ?>
            <div id="logo"><a href=""><img class="" src="<?php echo '../private/images/eshop.png' ?>" alt="store_logo" title="store" width="350" height="auto"></a></div>
        </header>