<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include("db.php");

    $selected_house_id = $_POST['selected_house_id'];
    $stars = $_POST['stars'];
    $comments = $_POST['comments'];

    // Insert the review into a reviews table (modify the table name as needed)
    $query = "INSERT INTO reviews (house_id, stars, comments) VALUES ('$selected_house_id', '$stars', '$comments')";
    $result = mysqli_query($con, $query);

    if ($result) {
        // JavaScript to show a popup and redirect to homepage after 2 seconds
        echo '<script>
                alert("Review submitted successfully. Thank you!");
                setTimeout(function(){
                    window.location.href = "homepage.html"; // Replace with the actual homepage URL
                }, 2); // 2000 milliseconds (2 seconds)
              </script>';
    } else {
        echo "Error: " . mysqli_error($con);
    }

    mysqli_close($con);
} else {
    echo "Invalid request.";
}
?>
