<?php
session_start();
ob_start();
include("db.php");

    $property_price = $_POST['property_price'];
    $property_availability = $_POST['property_availability'];
    $property_type = $_POST['property_type'];
    $location = $_POST['location'];

    $query = "INSERT INTO owner (property_price, property_availability, property_type, location) 
              VALUES ('$property_price', '$property_availability', '$property_type', '$location')";
    
    $result = mysqli_query($con, $query);

    if ($result) {
        header('Location: homepage.html'); 
        exit();
    } else {
        echo "Error: " . mysqli_error($con);
    }
    
?>