<?php

function is_post_request() {
    return $_SERVER['REQUEST_METHOD'] == 'POST';

}

function html_escape($string) {
    return htmlspecialchars($string);
}