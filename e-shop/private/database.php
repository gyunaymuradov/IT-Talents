<?php

require_once 'db_credentials.php';

function dbConnect() {
    try {
        $connection = new PDO('mysql:host=' . DB_IP . ':' . DB_PORT . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $connection;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
