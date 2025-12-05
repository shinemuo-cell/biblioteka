<?php
include_once 'db.inc.php';

$name = $_POST['name'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
#$number=$_POST["num"];
$loginName = $_POST['loginName'];
$pass = $_POST["pass"];

$sql = "INSERT INTO users (name, surname, email, phone, loginName, pass)
         VALUES ('$name', '$surname', '$email', '$phone', "$loginName", "$pass");";

mysqli_query($conn, $sql);
header("Location: ../loginPage.php");
exit();