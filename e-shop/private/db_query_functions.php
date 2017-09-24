<?php

function findAllProducts() {
    global $db;

    $statement = $db->prepare("SELECT id, image, title, price  FROM products WHERE archived = 0 ORDER BY id ASC");
    $statement->execute();
    return $statement;
}

function insertProduct($product) {
    global $db;

    $statement = $db->prepare("INSERT INTO products (title, price, description, image, archived) VALUES (:title, :price, :description, :image, :archived)");
    $statement->execute($product);
    $id = $db->lastInsertId();
    $result = ['lastInsertId' => $id, 'affectedRows' => $statement];
    return $result;
}

function findProductById($id) {
    global $db;

    $statement = $db->prepare("SELECT id, image, title, price, description FROM products WHERE id = :id AND archived = 0");
    $statement->execute(array("id" => $id));
    $product = $statement->fetch(PDO::FETCH_ASSOC);
    return $product;
}

function updateProduct($product) {
    global $db;

    $statement = $db->prepare("UPDATE products SET title = :title, price = :price, description = :description, image = :image WHERE id = :id AND archived = 0 LIMIT 1");
    $statement->execute($product);
    $result = ['updatedId' => $product['id'], 'success' => true];
    return $result;
}

function deleteProduct($id) {
    global $db;

    $statement = $db->prepare("UPDATE products SET archived = 1 WHERE id = :id LIMIT 1");
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

function updateAdmin($admin) {
    global $db;

    $statement = $db->prepare("UPDATE admins SET first_name = :firstName, last_name = :lastName, username = :username, email = :email, password = :password WHERE id = :id LIMIT 1");
    $statement->execute($admin);
    $result = ['updatedId' => $admin['id'], 'success' => true];
    if ($_SESSION['adminId'] == $admin['id']) {
    $_SESSION['username'] = $admin['username'];
    }
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

function validateAdmin($admin) {

    $firstNameIsBlank = false;
    if(isBlank($admin['firstName'])) {
        $firstNameIsBlank = true;
        $errors[] = "First name cannot be blank.";
    }

    // check first name size
    if (!$firstNameIsBlank) {
        if (!hasLengthGreaterThan($admin['firstName'], 2)) {
            $errors[] = "First name must be at least 2 characters long.";
        } else if (!hasLengthLessThan($admin['firstName'], 12)) {
            $errors[] = "First name cannot be longer than 12 characters.";
        }
    }

    $lastNameIsBlank = false;
    if(isBlank($admin['lastName'])) {
        $lastNameIsBlank = true;
        $errors[] = "Last name cannot be blank.";
    }

    // check last name size
    if (!$lastNameIsBlank) {
        if (!hasLengthGreaterThan($admin['lastName'], 2)) {
            $errors[] = "Last name must be at least 2 characters long.";
        } else if (!hasLengthLessThan($admin['lastName'], 12)) {
            $errors[] = "Last name cannot be longer than 12 characters.";
        }
    }

    $emailIsBlank = false;
    if(isBlank($admin['email'])) {
        $emailIsBlank = true;
        $errors[] = "Email cannot be blank.";
    }

    // check email size
    if (!$emailIsBlank) {
        if (!hasLengthGreaterThan($admin['email'], 5)) {
            $errors[] = "Email must contain 5 or more characters.";
        } else if (!hasLengthLessThan($admin['email'], 25)) {
            $errors[] = "Email cannot be longer than 25 characters.";
        }
    }

    $usernameIsBlank = false;
    if(isBlank($admin['username'])) {
        $usernameIsBlank = true;
        $errors[] = "Username cannot be blank.";
    }

    // check username size
    if (!$usernameIsBlank) {
        if (!hasLengthGreaterThan($admin['username'], 5)) {
            $errors[] = "Username must contain 5 or more characters.";
        } else if (!hasLengthLessThan($admin['username'], 12)) {
            $errors[] = "Username cannot be longer than 12 characters.";
        }

        if (findAdminByUsername($admin['username'])) {
            $errors[] = "Username already exist. Try another.";
        }
    }

    $passwordIsBlank = false;
    if(isBlank($admin['password'])) {
        $passwordIsBlank = true;
        $errors[] = "Password cannot be blank.";
    }

    // check password size
    if (!$passwordIsBlank) {
        if (!hasLengthGreaterThan($admin['password'], 6)) {
            $errors[] = "Password must be at least 6 characters long.";
        } else if (!hasLengthLessThan($admin['password'], 12)) {
            $errors[] = "Password cannot be longer than 12 characters.";
        }
    }


    if(isBlank($admin['confirmPassword'])) {
        $errors[] = "Confirm password cannot be blank.";
    } else if ($admin['password'] !== $admin['confirmPassword']) {
        $errors[] = "Password and confirm password does not match.";
    }

    return $errors;
}

function insertAdmin($admin) {
    global $db;

    $errors = validateAdmin($admin);
    if (!empty($errors)) {
        return $errors;
    }
    unset($admin['confirmPassword']);
    $statement = $db->prepare("INSERT INTO admins (first_name, last_name, username, email, password) VALUES (:firstName, :lastName, :username, :email, :password)");
    $statement->execute($admin);
    $id = $db->lastInsertId();
    $result = ['lastInsertId' => $id, 'affectedRows' => $statement];
    return $result;
}