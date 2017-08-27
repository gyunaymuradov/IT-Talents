<?php
session_start();
$successfulLogIn = null;

// check if the user is logged and redirect to main.php


// get the username and password from the login form
if (isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["logIn"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // open owners.json
    $file = file_get_contents("owners.json");
    $owners = json_decode($file, true);

    // check if the user and password match and if so redirect to main.php
    foreach ($owners as $key => $value) {
        if ($username == $key && $password == $value["pass"]) {
            $successfulLogIn = true;
            $_SESSION["logged"] = true;
            $_SESSION["user"] = $username;
            header("Location:main.php");
        } // else set the login flag to false and display error message
        else {
            $successfulLogIn = false;
        }
    }
}

$userExist = null;

// get the data from the register form
if (isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["register"])) {
    $newUsername = $_POST["username"];
    $newPassword = $_POST["password"];

    // check if the username already exist
    $usersFile = file_get_contents("owners.json");
    $allUsers = json_decode($usersFile, true);
    foreach ($allUsers as $key => $value) {
        if ($newUsername == $key) {
            $userExist = true;
        }
    }
    // if the register is successful add the owner to the owners list and redirect to main.php
    if ($userExist == false) {
        $allUsers[$newUsername]["pass"] = $newPassword;
        $money = rand(80, 1001);
        $allUsers[$newUsername]["money"] = $money;
        file_put_contents("owners.json", json_encode($allUsers));
        $_SESSION["logged"] = true;
        $_SESSION["user"] = $newUsername;
        header("Location:main.php");
    }
}

?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Slaves</title>
        <style>
            h1  {
                text-transform: uppercase;
                text-decoration: underline;
                text-align: center;
                margin-top: 70px;
            }
            .center {
                border-radius: 50px;
                width: 550px;
                margin: 10px auto;
                text-align: center;
            }
            body {
                background-color: burlywood;
                font-family: sans-serif;
            }
            fieldset {
                background-color: darkgray;
            }
            input, fieldset {
                border: solid darkslategray;
                border-width: 2px;
                border-radius: 50px;
            }
            .warning {
                color: red;
                text-transform: uppercase;

            }
            img {
                margin: 20px auto;
                display: block;
                border-radius: 50px;
                position:relative;
            }
            .yellow {
            background-color: rgb(250, 255, 189);
            }
        </style>
    </head>
    <body>
        <h1>Welcome to the biggest auction for slaves!</h1>
        <div class="center">
            <p>Already have an account? Log in to check your slaves and current balance</p>
            <?php
            if (isset($successfulLogIn) && $successfulLogIn == false) {
                echo "<p class='warning'>Username or password does not exist!</p>";
            }
            ?>
            <fieldset class="center">
                <legend>Log in</legend>
                <form action="" method="post">
                    <label for="username">Username: </label>
                    <input class="yellow" type="text" name="username" id="username" required>
                    <label for="password">Password: </label>
                    <input class="yellow" type="password" name="password" id="password" required>
                    <input class="yellow" type="submit" name="logIn" value="Log in">
                </form>
            </fieldset>
        </div>
        <img src="assets/1.jpg" alt="slave" title="slave" width="550px" height="400px">
        <div class="center">
            <p>New to the site? Register below to get all the benefits from our slaves!</p>
            <?php
            if (isset($userExist) && $userExist == true) {
            echo "<p class=\"center warning\">Owner with this username already exist! Please choose another one</p>";
            }
            ?>
            <fieldset class="center">
                <legend>Register</legend>
                <form action="" method="post">
                    <label for="usernameReg">Username: </label>
                    <input class="yellow" type="text" name="username" id="usernameReg" required>
                    <label for="passwordReg">Password: </label>
                    <input class="yellow" type="password" name="password" id="passwordReg" required>
                    <input class="yellow" type="submit" name="register" value="Register">
                </form>
            </fieldset>
        </div>
    </body>
</html>
