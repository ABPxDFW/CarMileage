<?php
    if(isset($_POST["submit"])) {
        $firstName = $_POST["firstname"];
        $lastName = $_POST["lastname"];
        $email = $_POST["email"];
        $username = $_POST["uid"];
        $password = $_POST["psw"];
        $pswRepeat = $_POST["pswrepeat"];

        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';

        if(emptyInputSignup($firstName,$lastName,$email,$username,$password,$pswRepeat) !== false) {
            header("location: ../signup.php?error=emptyinput");
            exit();
        }
        if(invalidUid($username) !== false) {
            header("location: ../signup.php?error=invaliduid");
            exit();
        }
        if(invalidEmail($email) !== false) {
            header("location: ../signup.php?error=invalidemail");
            exit();
        }
        if(pswMatch($password,$pswRepeat) !== false) {
            header("location: ../signup.php?error=unmatchedpsw");
            exit();
        }
        if(uidExists($conn,$username,$email) !== false) {
            header("location: ../signup.php?error=usernametaken");
            exit();
        }

        createUser($conn,$firstName,$lastName,$email,$username,$password);
    }

    else {
        header("location: ../signup.php");
        exit();
    }