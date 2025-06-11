<?php
    include_once 'header.php';
?>
    <section class="signup-form">
        <h2>Sign Up</h2>
        <div class="signup-form-form">
            <form action="include/signup.inc.php" method="post">
                <input type="text" name="firstname" placeholder="Enter first name">
                <input type="text" name="lastname" placeholder="Enter last name"><br>
                <input type="text" name="email" placeholder="Enter email"><br>
                <input type="text" name="uid" placeholder="Enter user name"><br>
                <input type="password" name="psw" placeholder="Enter a password"><br>
                <input type="password" name="pswrepeat" placeholder="Re-enter password"><br>
                <button type="submit" name="submit">Sign Up</button>
            </form>
        </div>
        <?php
            if(isset($_GET["error"])) {
                if($_GET["error"] == "emptyinput") {
                    echo "<p>Please be sure to fill out all fields.</p>";
                }
                else if($_GET["error"] == "invaliduid") {
                    echo "<p>The username entered is invalid. Please try again.</p>";
                }
                else if($_GET["error"] == "invalidemail") {
                    echo "<p>Please input a valid email.</p>";
                }
                else if($_GET["error"] == "unmatchedpsw") {
                    echo "<p>The passwords entered do not match. Please try again.</p>";
                }
                else if($_GET["error"] == "usernametaken") {
                    echo "<p>The username and/or email entered has already been taken. Please try again.</p>";
                }
                else if($_GET["error"] == "none") {
                    echo "<p>New account has been created successfully.</p>";
                }
            }
        ?>
    </section>

<?php
    include_once 'footer.php';
?>