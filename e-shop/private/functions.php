<?php

function isPostRequest() {
    return $_SERVER['REQUEST_METHOD'] == 'POST';

}

function htmlEscape($string) {
    return htmlspecialchars($string);
}

function redirectTo($location) {
    header('Location: ' . $location);
}

function getUrl($scriptPath) {
    // add the leading '/' if not present
    if($scriptPath[0] != '/') {
        $scriptPath = "/" . $scriptPath;
    }
    return WWW_ROOT . $scriptPath;
}


function logInAdmin($admin) {
    // Regenerating the ID protects the admin from session fixation.
    session_regenerate_id();
    $_SESSION['adminId'] = $admin['id'];
    $_SESSION['username'] = $admin['username'];
    return true;
}



function displayErrors($errors) {
    if (!empty($errors) && is_array($errors)) {
        echo "<div class=\"errors\"><ul>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul></div>";
    }
}

function requireLogin() {
    if (!isset($_SESSION['adminId'])) {
        redirectTo(getUrl('/staff/login.php'));
    }
}

function logoutAdmin() {
    unset($_SESSION['adminId']);
    unset($_SESSION['username']);
}