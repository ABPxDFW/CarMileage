<?php
if(isset($_POST["submit"])) {
    $stationName = $_POST["station_name"];
    $stationCode = $_POST["station_code"];
    $street = $_POST["street"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $phone = $_POST["phone"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputStation($stationName,$stationCode,$street,$city,$state,$phone) !== false) {
        header("location: ../add_station.php?error=emptyinput");
        exit();
    }
    if(invalidStation($stationCode) !== false) {
        header("location: ../add_station.php?error=invalidstation");
        exit();
    }
    if(stationExists($conn,$stationCode) !== false) {
        header("location: ../add_station.php?error=stationtaken");
        exit();
    }

    createStation($conn,$stationName,$stationCode,$street,$city,$state,$phone);
}

else {
    header("location: ../add_station.php");
    exit();
}