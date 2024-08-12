<?php
include("db.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['house_ids']) && is_array($_POST['house_ids'])) {
        $house_ids = implode(',', $_POST['house_ids']);

        $query = "UPDATE owner SET property_availability = 0 WHERE id IN ($house_ids)";
        $result = mysqli_query($con, $query);

        if ($result) {
            echo "Selected houses marked as booked successfully.";

            // JavaScript to show a popup and redirect after 5 seconds
            echo '<script>
                    setTimeout(function(){
                        alert("Booking done!");
                        window.location.href = "homepage.html"; // Replace with the actual new page URL
                    }, 5);
                  </script>';
        } else {
            echo "Error: " . mysqli_error($con);
        }
    } else {
        echo "No houses selected for booking.";
    }
}

mysqli_close($con);
?>
