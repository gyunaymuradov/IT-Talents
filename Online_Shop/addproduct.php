<?php
session_start();
$errorMessage = "";
$logged = true;
if ($_SESSION["logged"] == false || !isset($_SESSION["logged"])) {
    $errorMessage = "You need to log in order to be able to add products.<br><br>Don't have an account? <a href='login.php'>Click</a> to register";
    $logged = false;
}

if (isset($_POST["product"]) && isset($_POST["description"]) && isset($_POST["price"])
    && isset($_FILES["main_image"]) && isset($_POST["add"])) {
    $productName = $_POST["product"];
    $productDescription = $_POST["description"];
    $productPrice = $_POST["price"];
    $mainImgTempName = $_FILES["main_image"]["tmp_name"];
    $mainImgRealName = $_FILES["main_image"]["name"];
    $extension = "." . findExt($mainImgRealName);

//    to do additional images
//    $additionalImgs = $_FILES["additional_images"];

    if (is_uploaded_file($mainImgTempName)) {
        $productsFile = file_get_contents("products.json");
        $productsArr = json_decode($productsFile, true);

        $currentId = count($productsArr) + 1;

        move_uploaded_file($mainImgTempName, "assets/uploads/" . $currentId . $extension);

        $path = "assets/uploads/" . $currentId . $extension;
    $productsArr[] = [ "id" => $currentId, "title" => $productName, "price" => $productPrice,
        "description" => $productDescription, "mainImg" => $path ];

    file_put_contents("products.json", json_encode($productsArr));
    header("Location:index.php");
    }
}

require_once "header.php";

require_once "addproduct_view.php";

require_once "footer.php";

function findExt ($filename)
{
    $filename = strtolower($filename) ;
    $exts = explode(".", $filename) ;
    $n = count($exts)-1;
    $exts = $exts[$n];
    return $exts;
}