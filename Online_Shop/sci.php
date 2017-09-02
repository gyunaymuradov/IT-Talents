<?php
session_start();
    require_once "header.php";
    echo "<nav>
    <div id=\"nav\" class=\"float-left\">
        <fieldset id=\"nav_fieldset\">
            <legend>Menu</legend>
            <ul>
                <li><a href=\"index.php\">Home</a></li>
                <li><a href=\"index.php?page=about_us\">About Us</a></li>
                <li><a href=\"index.php?page=contacts\">Contacts</a></li>
                <li><a href=\"index.php?page=catalog\">Catalog</a></li>
                <li><a href=\"index.php?page=blog\">Blog</a></li>
            </ul>
        </fieldset>
    </div>
</nav>";

if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["number"]) && isset($_POST["message"]) && isset($_POST["send"])) {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $number = $_POST["number"];
    $message = $_POST["message"];

    $contacts = json_decode(file_get_contents("contactdb.json"), true);
    $contacts[] = array("name" => $name, "email" => $email, "number" => $number, "message" => $message);
    file_put_contents("contactdb.json", json_encode($contacts));

    echo "<br><main class=\"float-left\">
            <div class=\"sub-container\">Thank you for contacting us $name. We will get back to you as soon as possible!</div>
          </main>";

}
require_once "footer.php";