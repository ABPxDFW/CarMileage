<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <nav>
            <div class="wrapper">
                <a href="index.php">Banner</a>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="discover.php">About Us</a></li>
                    <li><a href="blog.php">Blog</a></li>

                    <?php
                        if(isset($_SESSION["userid"])) {
                            echo "<li><a href='welcomeback.php'>Welcome back Page</a></li>";
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