<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Reviews</title>
    <style>
        body {
            font-family: 'Helvetica', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background: url('img2.jpeg') center/cover no-repeat; /* Replace 'your-background-image.jpg' with your image file */
        }

        h1, h2 {
            color: #FF0000; /* Red color for headings */
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
        }

        label {
            margin-bottom: 10px;
            font-size: 18px;
            color: #000000; /* Black color for labels */
        }

        select {
            padding: 10px;
            font-size: 16px;
        }

        button {
            padding: 12px;
            background-color: #FFD700; /* Lemon Yellow color for the button */
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px; /* Add margin for space */
        }

        ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        li {
            margin-bottom: 10px;
            font-size: 18px;
            color: #FFD700; /* Lemon Yellow color for text */
        }

        p {
            font-size: 16px;
            color: #FFD700; /* Lemon Yellow color for text */
        }
    </style>
</head>
<body>
    <h1>View Reviews</h1>

    <form action="" method="post">
        <?php
        include("db.php");

        // Fetch available houses for selection
        $query = "SELECT * FROM owner";
        $result = mysqli_query($con, $query);

        if (mysqli_num_rows($result) > 0) {
            echo "<label for='selected_house_id'>Select House:</label>";
            echo "<select name='selected_house_id' required>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $row['id'] . "'>" . $row['location'] . "</option>";
            }
            echo "</select>";
            echo "<button type='submit'>View Reviews</button>";
        } else {
            echo "No houses available for selection.";
        }

        mysqli_close($con);
        ?>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['selected_house_id'])) {
            $selected_house_id = $_POST['selected_house_id'];

            include("db.php");

            // Fetch house details for the selected house
            $query_house = "SELECT * FROM owner WHERE id = $selected_house_id";
            $result_house = mysqli_query($con, $query_house);

            if (mysqli_num_rows($result_house) > 0) {
                $row_house = mysqli_fetch_assoc($result_house);

                // Display house details
                echo "<h2>House Details:</h2>";
                echo "<ul>";
                echo "<li>Property Price: $" . number_format($row_house['property_price']) . "</li>";
                echo "<li>Property Type: " . $row_house['property_type'] . "</li>";
                echo "<li>Location: " . $row_house['location'] . "</li>";
                // You can add more details as needed
                echo "</ul>";

                // Fetch reviews for the selected house
                $query_reviews = "SELECT * FROM reviews WHERE house_id = $selected_house_id";
                $result_reviews = mysqli_query($con, $query_reviews);

                if (mysqli_num_rows($result_reviews) > 0) {
                    echo "<h2>Reviews for Selected House:</h2>";
                    while ($row_review = mysqli_fetch_assoc($result_reviews)) {
                        echo "<p>";
                        echo "Stars: " . $row_review['stars'] . "<br>";
                        echo "Comments: " . $row_review['comments'] . "<br>";
                        echo "</p>";
                    }
                } else {
                    echo "No reviews available for the selected house.";
                }
            } else {
                echo "House details not found.";
            }

            mysqli_close($con);
        } else {
            echo "No house selected.";
        }
    }
    ?>
</body>
</html>
