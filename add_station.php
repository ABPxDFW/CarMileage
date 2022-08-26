<?php
include_once 'header.php';
?>
    <link rel="stylesheet" href="css/style.css">
    <section class="addstation-form">
        <h2>Enter Gas Station</h2>
        <div class="addstation-form-form">
            <form action="include/station.inc.php" method="post">
                <input type="text" name="station_code" placeholder="Enter a unique id for the gas station.">
                <input type="text" name="station_name" placeholder="Enter a name for the gas station">
                <input type="text" name="street" placeholder="Enter street.">
                <input type="text" name="city" placeholder="Enter city.">
                <input type="text" name="state" placeholder="Enter state.">
                <input type="text" name="phone" placeholder="Enter phone.">
                <button type="submit" name="submit">Submit</button>
            </form>
        </div>
        <?php
        if(isset($_GET["error"])) {
            if($_GET["error"] == "emptyinput") {
                echo "<p>Please be sure to fill out all fields.</p>";
            }
            else if($_GET["error"] == "stationtaken") {
                echo "<p>The station id entered has already been taken. Please try again.</p>";
            }
            else if($_GET["error"] == "invalidStationName") {
                echo "<p>Please enter a valid station name.</p>";
            }
            else if($_GET["error"] == "none") {
                echo "<p>New gas station has been added successfully.</p>";
            }
        }
        ?>
    </section>

<?php
include_once 'footer.php';
?>