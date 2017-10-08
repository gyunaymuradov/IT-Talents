<?php

require_once 'validation_functions.php';

function findAllProducts() {
    global $db;

    $statement = $db->prepare("SELECT id, image, title, price  FROM products WHERE archived = 0 ORDER BY id ASC");
    $statement->execute();
    return $statement;
}

function insertProduct($product) {
    global $db;

    $statement = $db->prepare("INSERT INTO products (title, price, description, image, archived, archive_date) VALUES (:title, :price, :description, :image, :archived, :archiveDate)");
    $statement->execute($product);
    $result['success'] = $statement;
    $result['lastInsertId'] = $db->lastInsertId();
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
    $affectedRows = $statement->rowCount();
    $result = ['updatedId' => $product['id'], 'success' => $affectedRows];
    return $result;
}

function deleteProduct($id) {
    global $db;

    $statement = $db->prepare("UPDATE products SET archived = 1, archive_date = NOW() WHERE id = :id LIMIT 1");
    $statement->execute(array("id" => $id));
    return $statement;
}

function findAllAdmins() {
    global $db;

    $statement = $db->prepare("SELECT id, first_name, last_name, username, email FROM admins WHERE active = 1 ORDER BY id ASC");
    $statement->execute();
    return $statement;
}

function findAdminById($id) {
    global $db;

    $statement = $db->prepare("SELECT first_name, last_name, username, email FROM admins WHERE id = :id AND active = 1");
    $statement->execute(array("id" => $id));
    $admin = $statement->fetch(PDO::FETCH_ASSOC);
    return $admin;
}

function updateAdmin($admin) {
    global $db;

    $statement = $db->prepare("UPDATE admins SET first_name = :firstName, last_name = :lastName, username = :username, email = :email, password = :password WHERE id = :id LIMIT 1");
    $statement->execute($admin);
    $result = ['updatedId' => $admin['id'], 'success' => $statement];
    if ($_SESSION['adminId'] == $admin['id']) {
    $_SESSION['username'] = $admin['username'];
    }
    return $result;
}

function deleteAdmin($id) {
    global $db;

    $statement = $db->prepare("UPDATE admins SET active = 0, archive_date = NOW() WHERE id = :id LIMIT 1");
    $statement->execute(array("id" => $id));
    return $statement;
}

function findAdminByUsername($username) {
    global $db;

    $statement = $db->prepare("SELECT id, username, password FROM admins WHERE username = :username AND active = 1");
    $statement->execute(array("username" => $username));
    $admin = $statement->fetch(PDO::FETCH_ASSOC);
    return $admin;
}

function validateContactUsForm($contactUsFormInfo) {
    $errors = array();

    $firstNameIsBlank = false;
    if (isBlank($contactUsFormInfo['firstName'])) {
        $firstNameIsBlank = true;
        $errors[] = "First name cannot be blank.";
    }

    // check the first name size
    if (!$firstNameIsBlank) {
        if (!hasLengthGreaterThan($contactUsFormInfo['firstName'], 3)) {
            $errors[] = "First name must be at least 3 characters long.";
        } else if (!hasLengthLessThan($contactUsFormInfo['firstName'], 15)) {
            $errors[] = "First name cannot be longer than 15 characters.";
        }
    }

    $lastNameIsBlank = false;
    if(isBlank($contactUsFormInfo['lastName'])) {
        $lastNameIsBlank = true;
        $errors[] = "Last name cannot be blank.";
    }

    // check the last name size
    if (!$lastNameIsBlank) {
        if (!hasLengthGreaterThan($contactUsFormInfo['lastName'], 3)) {
            $errors[] = "Last name must be at least 3 characters long.";
        } else if (!hasLengthLessThan($contactUsFormInfo['lastName'], 12)) {
            $errors[] = "Last name cannot be longer than 15 characters.";
        }
    }

    $emailIsBlank = false;
    if(isBlank($contactUsFormInfo['email'])) {
        $emailIsBlank = true;
        $errors[] = "Email cannot be blank.";
    }

    // check the email size
    if (!$emailIsBlank) {
        if (!hasLengthGreaterThan($contactUsFormInfo['email'], 5)) {
            $errors[] = "Email must contain 5 or more characters.";
        } else if (!hasLengthLessThan($contactUsFormInfo['email'], 25)) {
            $errors[] = "Email cannot be longer than 25 characters.";
        }
    }

    $phoneNumberIsBlank = false;
    if(isBlank($contactUsFormInfo['phone'])) {
        $phoneNumberIsBlank = true;
        $errors[] = "Phone number cannot be blank.";
    }

    // check the phone number
    if (!$phoneNumberIsBlank) {
        if (!preg_match('/^(0)[0-9]{9}$/', $contactUsFormInfo['phone'])) {
            $errors[]= "The phone number should contain only numbers, start with 0 and have exactly 10 digits length.";
        }
    }

    $messageIsBlank = false;
    if(isBlank($contactUsFormInfo['message'])) {
        $messageIsBlank = true;
        $errors[] = "Message field cannot be blank.";
    }

    // check length of message
    if (!$messageIsBlank) {
        if (!hasLengthGreaterThan($contactUsFormInfo['message'], 5)) {
            $errors[] = "Message must be at least 5 characters long.";
        }
    }

    return $errors;
}

function insertContactUsFormInfo($contactUsFormInfo) {
    global $db;

    $errors = validateContactUsForm($contactUsFormInfo);
    if (!empty($errors)) {
        return $errors;
    }

    $statement = $db->prepare("INSERT INTO contact_us_table (first_name, last_name, email, phone_number, message) 
                              VALUES (:firstName, :lastName, :email, :phone, :message)");
    $statement->execute($contactUsFormInfo);
    if ($statement == true) {
        return "success";
    }
}

function validateAdmin($admin) {
    $errors = array();

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
    $statement = $db->prepare("INSERT INTO admins (first_name, last_name, username, email, password, active) VALUES (:firstName, :lastName, :username, :email, :password, :active)");
    $statement->execute($admin);
    $id = $db->lastInsertId();
    $result = ['lastInsertId' => $id, 'success' => $statement];
    return $result;
}

function findAllArchivedProducts() {
    global $db;

    $statement = $db->prepare("SELECT id, image, title, price, archive_date FROM products WHERE archived = 1");
    $statement->execute();
    return $statement;
}

function findAllPastAdmins() {
    global $db;

    $statement = $db->prepare("SELECT id, first_name, last_name, username, email, archive_date FROM admins WHERE active = 0 ORDER BY archive_date DESC");
    $statement->execute();
    return $statement;
}

function getFreshlyAddedProducts() {
    global $db;

    $statement = $db->prepare("SELECT id, title, image, price, description FROM products WHERE archived = 0 ORDER BY id DESC LIMIT 4");
    $statement->execute();
    return $statement;
}

function getAllProducts($offset = 0, $limit = 4) {
    global  $db;

    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $statement = $db->prepare("SELECT id, title, image, price, description FROM products WHERE archived = 0 ORDER BY id DESC LIMIT :limit OFFSET :offset");
    $statement->execute(array("limit" => $limit, "offset" => $offset));
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function getProductsCount() {
    global $db;

    $statement = $db->prepare("SELECT COUNT(*) as count FROM products WHERE archived = 0");
    $statement->execute();
    $count = $statement->fetch(PDO::FETCH_ASSOC);
    return $count;
}
