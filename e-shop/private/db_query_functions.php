<?php
function findAllProducts() {
    global $db;

    $statement = $db->prepare("SELECT id, image, title, price  FROM products ORDER BY id ASC");
    $statement->execute();
    return $statement;
}

function insertProduct($product) {
    global $db;

    $statement = $db->prepare("INSERT INTO products (title, price, description, image)
                                          VALUES (:title, :price, :description, :image)");
    $statement->execute($product);
    $id = $db->lastInsertId();
    $result = ['lastInsertId' => $id, 'affectedRows' => $statement];
    return $result;
}

function findProductById($id) {
    global $db;

    $statement = $db->prepare("SELECT id, image, title, price, description FROM products WHERE id = :id");
    $statement->execute(array("id" => $id));
    $product = $statement->fetch(PDO::FETCH_ASSOC);
    return $product;
}

function updateProduct($product) {
    global $db;

    $statement = $db->prepare("UPDATE products SET title = :title, price = :price, description = :description, image = :image WHERE id = :id LIMIT 1");
    $statement->execute($product);
    $id = $db->lastInsertId();
    $result = ['lastInsertId' => $id, 'affectedRows' => $statement];
    return $result;
}

function deleteProduct($id) {
    global $db;

    $statement = $db->prepare("DELETE FROM products WHERE id = :id LIMIT 1");
    $statement->execute(array("id" => $id));
    return $statement;
}

function findAllAdmins() {
    global $db;

    $statement = $db->prepare("SELECT id, first_name, last_name, username, email FROM admins ORDER BY id ASC");
    $statement->execute();
    return $statement;
}

function findAdminById($id) {
    global $db;

    $statement = $db->prepare("SELECT first_name, last_name, username, email FROM admins WHERE id = :id");
    $statement->execute(array("id" => $id));
    $admin = $statement->fetch(PDO::FETCH_ASSOC);
    return $admin;
}

function insertAdmin($admin) {
    global $db;

    $statement = $db->prepare("INSERT INTO admins (first_name, last_name, username, email, password) VALUES (:firstName, :lastName, :username, :email, :password)");
    $statement->execute($admin);
    $id = $db->lastInsertId();
    $result = ['lastInsertId' => $id, 'affectedRows' => $statement];
    return $result;
}

function updateAdmin($admin) {
    global $db;

    $statement = $db->prepare("U{DATE admins SET first_name = :firstName, last_name = :lastName, username =:username, email = :email, password = :password");
    $statement->execute($admin);
    $id = $db->lastInsertId();
    $result = ['lastInsertId' => $id, 'affectedRows' => $statement];
    return $result;
}

function deleteAdmin($id) {
    global $db;

    $statement = $db->prepare("DELETE FROM admins WHERE id = :id LIMIT 1");
    $statement->execute(array("id" => $id));
    return $statement;
}

function findAdminByUsername($username) {
    global $db;

    $statement = $db->prepare("SELECT id, username, password FROM admins WHERE username = :username");
    $statement->execute(array("username" => $username));
    $admin = $statement->fetch(PDO::FETCH_ASSOC);
    return $admin;
}