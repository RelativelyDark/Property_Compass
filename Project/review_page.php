<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Give Review</title>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
        integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-backstretch/2.1.18/jquery.backstretch.min.js"
        integrity="sha512-bXc1hnpHIf7iKIkKlTX4x0A0zwTiD/FjGTy7rxUERPZIkHgznXrN/2qipZuKp/M3MIcVIdjF4siFugoIc2fL0A=="
        crossorigin="anonymous"></script>
<!--custom css file link-->
<link rel="stylesheet" href="sty.css">
<!--custom js file link-->
</head>
<body>
    <h1>Give Review</h1>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['selected_house_id'])) {
            $selected_house_id = $_POST['selected_house_id'];

            include("db.php");

            $query = "SELECT * FROM owner WHERE id = $selected_house_id";
            $result = mysqli_query($con, $query);

            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);

                // Display house details
                echo "<p>House Details:</p>";
                echo "<ul>";
                echo "<li>Property Price: " . $row['property_price'] . "</li>";
                echo "<li>Property Type: " . $row['property_type'] . "</li>";
                echo "<li>Location: " . $row['location'] . "</li>";
                echo "</ul>";

                // Display form for review
                echo "<form action='process_review.php' method='post'>";
                echo "<input type='hidden' name='selected_house_id' value='$selected_house_id'>";
                echo "<label for='stars'>Number of Stars:</label>";
                echo "<input type='number' name='stars' min='1' max='5' required><br>";
                echo "<label for='comments'>Comments:</label>";
                echo "<textarea name='comments' rows='4' cols='50' required></textarea><br>";
                echo "<button type='submit'>Submit Review</button>";
                echo "</form>";
            } else {
                echo "House details not found.";
            }

            mysqli_close($con);
        } else {
            echo "No house selected for review.";
        }
    }
    ?>

</body>
</html>
