<?php
    include_once 'header.php';
?>
    <section class="signup-form">
        <h1>Log In</h1>
        <form action="include/login.inc.php" method="post">
            <input type="text" name="uid" placeholder="Enter Username/Email">
            <input type="password" name="psw" placeholder="Enter a password">
            <button type="submit" name="submit">Log In</button>
        </form>
        <?php
            if(isset($_GET["error"])) {
                if($_GET["error"] == "emptyinput") {
                    echo "<p>Please be sure to fill out all fields.</p>";
                }
                else if($_GET["error"] == "wronglogin") {
                    echo "<p>The username and password combination does not exist. Please try again.</p>";
                }
                else {
                    echo "logged in";
                }
            }
        ?>
    </section>

<?php
    include_once 'footer.php';
?>