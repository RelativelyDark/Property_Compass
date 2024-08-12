<?php
session_start();
ob_start();

	include("db.php");


	$FirstName = $_POST['FirstName'];
    $LastName = $_POST['LastName'];
    $PhoneNo = $_POST['PhoneNo'];
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];



      $query="INSERT into signup(FirstName,lastName,PhoneNo,Email,Password)
      values('$FirstName','$LastName',$PhoneNo,'$Email','$Password')";
      $result=mysqli_query($con,$query);

      header('Location:../Project/home.html');
?>