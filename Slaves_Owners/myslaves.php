<?php
session_start();

if (!isset($_SESSION["logged"]) || $_SESSION["logged"] == false) {
    header("Location:index.php");
}

$owner = $_SESSION["user"];
$owners = json_decode(file_get_contents("owners.json"), true);

$slaves = json_decode(file_get_contents("slaves.json"), true);

$hasSlaves = true;
if (empty($owners[$owner]["slaves"])) {
    $hasSlaves = false;
}
// free the slave and refund 50% of its price to the owner
foreach ($slaves as $slaveName => $properties) {

    if (isset($_POST[$slaveName])) {
        unset($owners[$owner]["slaves"][$slaveName]);
        $owners[$owner]["money"] += $properties["price"] / 2;
        file_put_contents("owners.json", json_encode($owners));
    }
}
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>My slaves</title>
        <style>
            body {
                font-family: sans-serif;
                background-color: gainsboro;
            }
            h1 {
                text-align: center;
                text-transform: uppercase;
                margin: 40px 0;
            }
            table {
                margin: 0 auto;
                border-collapse: collapse;
            }
            td, th {
                text-align: center;
                border: solid;
                border-collapse: collapse;
                background-color: burlywood;
            }
            .no-border {
                border: none;
                background-color: gainsboro;
            }
            .unchain {
                border: solid darkslategray;
                border-width: 2px;
                border-radius: 50px;
                background-color: rgb(250, 255, 189);
                width: 140px;
                font-size: 0.8em;
            }
            .center {
                margin: 10px auto;
                text-align: center;
            }
            a:link {
                text-decoration: none;
            }
            a:visited {
                text-decoration: none;
            }
            button {
                width: 130px;
                margin: 0 auto;
                display: block;
                border: solid darkslategray;
                border-width: 2px;
                border-radius: 50px;
                background-color: rgb(250, 255, 189);
                font-size: 0.8em;
            }
        </style>
    </head>
    <body>
        <h1>List of the slaves I own</h1>
        <form action="" method="post">
                <?php
                if ($hasSlaves) {
                    ?>
            <table>
                <tr>
                    <th class="no-border"></th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Performance</th>
                </tr>
                <?php
                    foreach ($owners[$owner]["slaves"] as $slaveName => $performance) {
                        $price = $slaves[$slaveName]["price"];
                        echo "<tr><td class='no-border'><img src='assets/unlock.png' height='35px' width='35px'></td><td>$slaveName</td><td>$price</td><td>$performance</td><td class='no-border'><input class='unchain' type='submit' name=$slaveName value='Unchain the slave'></td></tr>";
                    }
                ?>
                </table>
                <div class="center">*Note: keep in mind that if you free a slave you will get 50% of its price back!!!</div>
                <?php
                } else {
                    echo "<div class=\"center\">$owner, you currently have no slaves, go to the main page to get some!</div>";
                }
                ?>
        </form>
        <button><a href="main.php">Back</a></button>
    </body>
</html>
