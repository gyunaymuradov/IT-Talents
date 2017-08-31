<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My store</title>
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
</head>
<body>
<div id="container">
    <header>
        <?php
        if (!isset($_SESSION["logged"]) || $_SESSION["logged"] == false) {
            echo "<div class='float-right'>You are not logged in. <a href='login.php'>(Log in)</a></div>";
        } else {
            $username = $_SESSION["username"];
            echo "<form action='login.php' method='post'>
                    <div class='float-right'>Welcome back, $username &nbsp;
                        <input class='float-right' id='logout-btn' type='submit' name='logout' value='Logout'>
                    </div>
                </form>";
        }
        ?>
        <img id="header_img" class="float-left" src="assets/images/shop1.jpg" alt="store_image" title="store" width="200px" height="120px">
        <div class="float-left"><h1 id="header">Online Market</h1></div>
    </header>