<?php

function isBlank($value) {
    if (!isset($value) || trim($value) === '') {
        return true;
    }
    return false;
}

function hasLengthGreaterThan($value, $min) {
    $length = trim(strlen($value));
    return $length >= $min;
}

function hasLengthLessThan($value, $max) {
    $length = trim(strlen($value));
    return $length <= $max;
}

function containsSpace($value) {
    if (preg_match('/\s/',$value)) {
        return true;
    }
    return false;
}

