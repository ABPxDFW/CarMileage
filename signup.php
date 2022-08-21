<?php
    include_once 'header.php';
?>
    <section class="signup-form">
        <h2>Sign Up</h2>
        <form action="include/signup.inc.php" method="post">
            <input type="text" name="firstname" placeholder="Enter first name">
            <input type="text" name="lastname" placeholder="Enter last name">
            <input type="text" name="email" placeholder="Enter email">
            <input type="text" name="uid" placeholder="Enter user name">
            <input type="password" name="psw" placeholder="Enter a password">
            <input type="password" name="pswrepeat" placeholder="Re-enter password">
            <button type="submit" name="submit">Sign Up</button>
        </form>
    </section>

<?php
    include_once 'footer.php';
?>