<?php
    if(isset($_POST["submit"])) {
        $carName = $_POST["car_name"];
        $brand = $_POST["brand"];
        $model = $_POST["model"];
        $yearMade = $_POST["year_made"];
        $dateOwned = $_POST["date_owned"];

        require_once ('dbh.inc.php');
        require_once ('functions.inc.php');

        if(emptyInputVehicle($carName,$brand,$model,$yearMade,$dateOwned) !== false) {
            header("location: ../add_car.php?error=emptyinput");
            exit();
        }
        if(invalidVehicle($carName) !== false) {
            header("location: ../add_car.php?error=invalidVehicle");
            exit();
        }
        if(vehicleExists($conn,$carName) !== false) {
            header("location: ../add_car.php?error=vehicletaken");
            exit();
        }

        createVehicle($conn,$carName,$brand,$model,$yearMade,$dateOwned);
    }

    else {
        header("location: ../add_car.php");
        exit();
    }