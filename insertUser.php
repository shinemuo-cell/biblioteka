<?php
include_once 'db.inc.php';

$name = $_POST['name'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
#$number=$_POST["num"];

$sql = "INSERT INTO users (name, surname, email, phone)
         VALUES ('$name', '$surname', '$email', '$phone');";

mysqli_query($conn, $sql);
header("Location: ../loginPage.php");
exit();