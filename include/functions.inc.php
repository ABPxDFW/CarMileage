<?php

function emptyInputSignup($firstName,$lastName,$email,$username,$password,$pswRepeat) {
    $result;
    if(empty($firstName) || empty($lastName) || empty($email) || empty($username) || empty($password) || empty($pswRepeat)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function invalidUid($username) {
    $result;
    if(!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email) {
    $result;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function pswMatch($password,$pswRepeat) {
    $result;
    if($password !== $pswRepeat) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function uidExists($conn,$username, $email) {
    $sql = "SELECT * FROM users WHERE userName = ? OR userEmail = ?;";
    $stmt = mysqli_stmt_init($conn);

    //Check to make sure the query syntax is correct.
    if(!mysqli_stmt_prepare($stmt,$sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    // ss is two strings, if there are 3 strings, it will be "sss".
    mysqli_stmt_bind_param($stmt,"ss",$username,$email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn,$firstName,$lastName,$email,$username,$password) {
    $sql = "INSERT INTO users (userFirstName,userLastName,userEmail,userName,userPassword) VALUES (?,?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);

    //Check to make sure the query syntax is correct.
    if(!mysqli_stmt_prepare($stmt,$sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    $hashedPsw = password_hash($password,PASSWORD_DEFAULT);

    // sssss is five strings, if there are 3 strings, it will be "sss".
    mysqli_stmt_bind_param($stmt,"sssss",$firstName,$lastName,$email,$username,$hashedPsw);

    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

    header("location: ../signup.php?error=none");
    exit();
}

function emptyInputLogin($username,$password) {
    $result;
    if(empty($username) || empty($password)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function loginUser($conn,$username,$password) {
    $uidExists = uidExists($conn,$username,$username);

    if($uidExists === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $pswHashed = $uidExists["userPassword"];
    $checkPsw = password_verify($password,$pswHashed);

    if($checkPsw === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }
    else if($checkPsw === true) {
        session_start();
        $_SESSION["userid"] = $uidExists["userId"];
        $_SESSION["userName"] = $uidExists["userName"];
        header("location: ../index.php");
        exit();
    }
}