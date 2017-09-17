<?php
function find_all_products() {
    global $db;

    $sql = "SELECT * FROM products ";
    $sql .= "ORDER BY id ASC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}