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
    $sql = "SELECT * FROM users WHERE userId = ? OR userEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
}