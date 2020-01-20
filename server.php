<?php
session_start();

$serverName = 'den1.mysql1.gear.host';
$userName = 'phpcrud';
$password = '';
$dbName = 'phpcrud';

$db = new mysqli($serverName, $userName, $password, $dbName);

// initialize variables
$name = "";
$description = "";
$id = 0;
$update = false;

if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];

    mysqli_query($db, "INSERT INTO phpcrud.developer (name, description) VALUES ('$name', '$description')"); 
    $_SESSION['message'] = "Developer saved"; 
    header('location: index.php');
}

?>