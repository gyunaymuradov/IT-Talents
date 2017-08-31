<?php
session_start();
if (isset($_POST["logout"])) {
    $_SESSION["logged"] = false;
    header("Location:index.php");
}

require_once "header.php";
$loginSuccess = true;

$message = "";

if (isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $users = json_decode(file_get_contents("users.json"), true);
    if (key_exists($username, $users) && $password == $users[$username]) {
        $_SESSION["logged"] = true;
        $_SESSION["username"] = $username;
        header("Location:index.php");
    } else {
        $loginSuccess = false;
        $message = "Username or password incorrect! Try again!";
    }
}

$usernameExist = false;
$passwordsMatch = true;
if (isset($_POST["new-user"]) && isset($_POST["new-pass"]) && isset($_POST["confirm-pass"]) && isset($_POST["register"])) {
    $username = $_POST["new-user"];
    $password = $_POST["new-pass"];
    $confirmpass = $_POST["confirm-pass"];

    $users = json_decode(file_get_contents("users.json"), true);

    if (key_exists($username, $users)) {
        $message = "User with this username already exist!";
        $usernameExist = true;
    } else if ($password != $confirmpass){
        $message = "Passwords do not match!";
        $passwordsMatch = false;
    } else {
        $users[$username] = $password;
        file_put_contents("users.json", json_encode($users));
        $_SESSION["logged"] = true;
        $_SESSION["username"] = $username;
        header("Location:index.php");
    }
}

require_once "login_view.php";
?>
