<?php
session_start();

if (!isset($_SESSION["logged"]) || $_SESSION["logged"] == false) {
    header("Location:index.php");
}

// get slaves arr
$slavesFile = file_get_contents("slaves.json");
$slaves = json_decode($slavesFile, true);

// get owners arr
$ownersFile = file_get_contents("owners.json");
$owners = json_decode($ownersFile, true);

$moneyNotEnough = false;
$slaveName = "";

$currentOwner = $_SESSION["user"];

$alreadyOwnsTheSlave = false;

// get the slave's name and check if the owners money is enough to buy it
foreach ($slaves as $key => $value) {
    if (isset($_POST[$key])) {
        $name = $key;

        $ownerMoney = $owners[$currentOwner]["money"];
        $slavePrice = $slaves[$name]["price"];

        if ($ownerMoney < $slavePrice) {
            $moneyNotEnough = true;
            $slaveName = $name;
            break;
        }

        // check if the owner already owns this slave and if not make the slave property of the owner
        else {
            if (isset($owners[$currentOwner]["slaves"])) {
                if (key_exists($name, $owners[$currentOwner]["slaves"])) {
                    $slaveName = $name;
                    $alreadyOwnsTheSlave = true;
                }
                else {
                    $slavesPerformance = $slaves[$name]["performance"];
                    $currentSlavePrice = $slaves[$name]["price"];
                    $owners[$currentOwner]["slaves"][$name] = $slavesPerformance;
                    $owners[$currentOwner]["money"] -= $slavePrice;
                    file_put_contents("owners.json", json_encode($owners));
                }
            }
            else {
                $slavesPerformance = $slaves[$name]["performance"];
                $currentSlavePrice = $slaves[$name]["price"];
                $owners[$currentOwner]["slaves"][$name] = $slavesPerformance;
                $owners[$currentOwner]["money"] -= $slavePrice;
                file_put_contents("owners.json", json_encode($owners));
            }
        }
    }
}

$currentOwnerMoney = $owners[$currentOwner]["money"];
if (isset($owners[$currentOwner]["slaves"])) {
    $currentOwnerStrawberries = array_sum($owners[$currentOwner]["slaves"]);
} else {
    $currentOwnerStrawberries = 0;
}

// logout the current owner
if (isset($_POST["logout"])) {
    $_SESSION["logged"] = false;
    header("Location:index.php");
}

// redirect the current owner to see his slaves
if (isset($_POST["mySlaves"])) {
    header("Location:myslaves.php");
}

?>


<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Main</title>
        <style>
            body {
                font-family: sans-serif;
                background-color: gainsboro;
                font-size: 1.5em;
            }
            div {
                text-align: center;
                margin: 20px 0;
                text-decoration: underline;
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
            .warning {
                color: red;
                text-transform: uppercase;
                text-align: center;
            }
            .submit, .actions {
                border: solid darkslategray;
                border-width: 2px;
                border-radius: 50px;
                background-color: rgb(250, 255, 189);
            }
            .center {
                text-align: center;
                margin-bottom: 20px;
            }
            .actions {
                width: 200px;
                font-size: 0.8em;
            }
            .buy {
                width: 90px;
                font-size: 0.7em;
            }
        </style>
    </head>
    <body>
    <div>Hello <?php echo $currentOwner; ?>! The balance on your account is <?php echo $currentOwnerMoney; ?> gold and <?= $currentOwnerStrawberries; ?> strawberries!</div>
    <form action="" method="post" class="center">
        <input class="actions" type="submit" value="Logout" name="logout">
        <input class="actions" type="submit" value="View my slaves" name="mySlaves">
    </form>
    <?php
    if ($moneyNotEnough) {
        echo "<p class='warning'>You don't have enough money to buy slave $slaveName! Please choose a cheaper one!</p>";
    }
    if ($alreadyOwnsTheSlave) {
        echo "<p class='warning'>You already own slave $slaveName! Cannot buy it again! Please choose another one!</p>";
    }
    ?>
        <form action="" method="post">
            <table>
                <tr>
                    <th class="no-border"></th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Performance</th>
                    <th class="no-border"></th>
                </tr>
                <?php
                foreach ($slaves as $key => $value) {
                    $price = $value["price"];
                    $performance = $value["performance"];
                    echo "<tr>
                            <td class='no-border'><img src='assets/lock.png' height='35px' width='35px'></td><td>$key</td><td>$price</td><td>$performance</td><td class='no-border'><input class='submit buy' type='submit' name=$key value='Buy'></td>
                          </tr>";
                }
                ?>
            </table>
        </form>
    </body>
</html>


