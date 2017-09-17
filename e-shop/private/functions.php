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