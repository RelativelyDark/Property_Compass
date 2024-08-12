<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rate Houses</title>
</head>
<body>
    <h1>Rate Houses</h1>

    <form action="review_page.php" method="post">
        <?php
        include("db.php");

        $query = "SELECT * FROM owner"; // Show all houses for rating
        $result = mysqli_query($con, $query);

        if (mysqli_num_rows($result) > 0) {
            echo "<ul>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<li>";
                echo "Property Price: " . $row['property_price'] . "<br>";
                echo "Property Type: " . $row['property_type'] . "<br>";
                echo "Location: " . $row['location'] . "<br>";
                echo '<input type="radio" name="selected_house_id" value="' . $row['id'] . '"> Rate';
                echo "</li>";
            }
            echo "</ul>";
        } else {
            echo "No houses available for rating.";
        }

        mysqli_close($con);
        ?>

        <button type="submit">Give Review</button>
    </form>

</body>
</html>
