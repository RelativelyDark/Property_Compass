<?php
session_start();
ob_start();

include("db.php");

$Email = $_POST['Email'];
$Password = $_POST['Password'];

$sql = "SELECT Password FROM signup WHERE email='$Email'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);



if ($row) {
    $storedPassword = $row["Password"];
    if ($Password == $storedPassword) {
        header('Location: ../Project/homepage.html');
        exit();
    } else {
        header('Location: ../Project/home.html');
        exit();
    }
} else {
    header('Location: ../Project/home.html');
    exit();
}
?>