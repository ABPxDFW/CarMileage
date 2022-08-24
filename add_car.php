<?php
include_once 'header.php';
?>
    <link rel="stylesheet" href="css/style.css">
    <section class="addcar-form">
        <h2>Enter vehicle</h2>
        <div class="addcar-form-form">
        <form action="include/vehicle.inc.php" method="post">
            <input type="text" name="car_name" placeholder="Enter a name for the car.">
            <input type="text" name="brand" placeholder="Enter brand.">
            <input type="text" name="model" placeholder="Enter model.">
            <input type="text" name="year_made" placeholder="Enter year.">
            <input type="text" name="date_owned" placeholder="Enter date owned.">
            <button type="submit" name="submit">Submit</button>
        </form>
        </div>
        <?php
        if(isset($_GET["error"])) {
            if($_GET["error"] == "emptyinput") {
                echo "<p>Please be sure to fill out all fields.</p>";
            }
            else if($_GET["error"] == "vehicletaken") {
                echo "<p>The vehicle name entered has already been taken. Please try again.</p>";
            }
            else if($_GET["error"] == "invalidVehicle") {
                echo "<p>Please enter a valid vehicle name.</p>";
            }
            else if($_GET["error"] == "none") {
                echo "<p>New vehicle has been added successfully.</p>";
            }
        }
        ?>
    </section>

<?php
include_once 'footer.php';
?>