<?php

require_once '../private/public_functions.php';

$search = $_GET['search'];

$result = searchProductByPartOfTheTitle($search);

echo json_encode($result);