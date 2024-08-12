<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Available Houses</title>
</head>
<body>
    <h1>List of Available Houses</h1>

    <form action="your_processing_file.php" method="post">
        <?php
        include("db.php");

        $query = "SELECT * FROM owner WHERE property_availability = 1";
        $result = mysqli_query($con, $query);

        if (mysqli_num_rows($result) > 0) {
            echo "<ul>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<li>";
                echo "Property Price: " . $row['property_price'] . "<br>";
                echo "Property Availability: " . $row['property_availability'] . "<br>";
                echo "Property Type: " . $row['property_type'] . "<br>";
                echo "Location: " . $row['location'] . "<br>";
                echo '<input type="checkbox" name="house_ids[]" value="' . $row['id'] . '"> Select';
                echo "</li>";
            }
            echo "</ul>";
        } else {
            echo "No houses available.";
        }

        mysqli_close($con);
        ?>

        <button type="submit">Submit Application</button>
    </form>

</body>
</html>
