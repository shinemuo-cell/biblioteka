<?php
include_once 'db.inc.php';

// Gaunami duomenys iš POST
$name = $_POST['name'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$phone = $_POST['phone'];

// Užklausa darbuotojo įterpimui
$sql = "INSERT INTO employees (name, surname, email, phone)
         VALUES ('$name', '$surname', '$email', '$phone');";

// Vykdoma užklausa ir grįžtama atgal
mysqli_query($conn, $sql);
header("Location: ../darbuotojai.php");
exit();