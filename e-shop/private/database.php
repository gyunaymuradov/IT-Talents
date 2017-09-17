<?php

require_once 'db_credentials.php';

function dbConnect() {
    $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    return $connection;
}

function dbDisconnect($connection) {
        if (isset($connection)) {
            mysqli_close($connection);
    }
}

function dbEscape($connection, $string) {
    return mysqli_real_escape_string($connection, $string);
}

function confirmDbConnection() {
    if (mysqli_connect_errno()) {
        $message = "Database connection failed: ";
        $message .= mysqli_connect_error();
        $message .= " (" . mysqli_connect_errno() . ")";
        exit($message);
    }
}

function confirmResultSet($result_set) {
    if (!$result_set) {
       exit('Database query failed!');
    }
}