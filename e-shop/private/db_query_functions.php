<?php
function findAllProducts() {
    global $db;

    $sql = "SELECT * FROM products ";
    $sql .= "ORDER BY id ASC";
    $result = mysqli_query($db, $sql);
    confirmResultSet($result);
    return $result;
}

function insertProduct($product) {
    global $db;

    $sql = "INSERT INTO products ";
    $sql .= "(title, price, description, image) ";
    $sql .= "VALUES (";
    $sql .= "'" . dbEscape($db, $product['title']) . "',";
    $sql .= "'" . dbEscape($db, $product['price']) . "',";
    $sql .= "'" . dbEscape($db, $product['description']) . "',";
    $sql .= "'" . dbEscape($db, $product['image']) . "'";
    $sql .= ")";

    $result = mysqli_query($db, $sql);
    if ($result) {
        return true;
    } else {
        echo mysqli_error($db);
        dbDisconnect($db);
        exit();
    }
}