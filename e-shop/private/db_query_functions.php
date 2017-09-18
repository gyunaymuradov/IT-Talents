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

function findProductById($id) {
    global $db;

    $sql = "SELECT * FROM products ";
    $sql .= "WHERE id='" . dbEscape($db, $id) . "'";
    $result = mysqli_query($db, $sql);

    confirmResultSet($result);
    $product = mysqli_fetch_assoc($result);
    return $product;
}

function updateProduct($product) {
    global $db;

    $sql = "UPDATE products SET ";
    $sql .= "title='" . dbEscape($db, $product['title']) . "', ";
    $sql .= "price='" . dbEscape($db, $product['price']) . "', ";
    $sql .= "description='" . dbEscape($db, $product['description']) . "', ";
    $sql .= "image='" . dbEscape($db, $product['image']) . "' ";
    $sql .= "WHERE id='" . dbEscape($db, $product['id']) . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);
    if($result) {
        return true;
    } else {
        echo mysqli_error($db);
        dbDisconnect($db);
        exit;
    }
}

function deleteProduct($id) {
    global $db;

    $sql = "DELETE FROM products ";
    $sql .= "WHERE id='" . dbEscape($db, $id) . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);
    if ($result) {
        return true;
    } else {
        echo mysqli_error($db);
        dbDisconnect($db);
        exit();
    }
}