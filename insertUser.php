<?php
include_once 'db.inc.php';

$name = $_POST['name'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$number=$_POST["num"];
$loginName = $_POST['loginName'];
$pass = $_POST["pass"];

$stmt = $conn->prepare("INSERT INTO users (name, surname, email, phone, pass, loginname, number) 
                        VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssss", $name, $surname, $email, $phone, $pass, $loginName, $number);
$stmt->execute();

header("Location: /newFolder/biblioteka-main/loginPage.php");
exit();