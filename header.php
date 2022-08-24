<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/style.css">
        <title></title>
    </head>
    <body>
        <nav>
            <div class="wrapper">
              <!--  <a href="index.php">Banner</a> -->
                <ul>
                    <li><a href="index.php">Home</a></li>

                    <?php
                        if(isset($_SESSION["userid"]) && $_SESSION["admin"] == 'Y') {
                            echo "<li><a href='add_car.php'>Add Vehicle</a></li>";
                            echo "<li><a href='add_station.php'>Add Gas Station</a></li>";
                            echo "<li><a href='add_transaction.php'>Input Transaction</a></li>";
                            echo "<li><a href='include/logout.inc.php'>Log out</a></li>";
                        }
                        else if(isset($_SESSION["userid"])) {
                            echo "<li><a href='add_transaction.php'>Input Transaction</a></li>";
                            echo "<li><a href='include/logout.inc.php'>Log out</a></li>";
                        }
                        else {
                            echo "<li><a href='signup.php'>Sign-Up</a></li>";
                            echo "<li><a href='login.php'>Login</a></li>";
                        }
                    ?>

                </ul>
            </div>
        </nav>
    <div class="wrapper">