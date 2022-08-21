<?php
    include_once 'header.php';
?>
    <section class="signup-form">
        <h2>Log In</h2>
        <form action="include/login.inc.php" method="post">
            <input type="text" name="name" placeholder="Enter Username/Email">
            <input type="password" name="psw" placeholder="Enter a password">
            <button type="submit" name="button">Log In</button>
        </form>
    </section>

<?php
    include_once 'footer.php';
?>