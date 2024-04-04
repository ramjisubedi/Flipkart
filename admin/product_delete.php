<?php
ob_start();
include('header.php'); 
if(!isset($_SESSION['login'])){
    header('location:../');
    // echo "<script>location.href='".$URL."/login.php';</script>";
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "flipkart_clone";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];
$result = mysqli_query($conn, "DELETE FROM products WHERE id = $id");
// Redirect to the main display page (index.php in our case)
header("Location:index.php");


   
  