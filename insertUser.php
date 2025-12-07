<?php
include_once 'db.inc.php';

$name = $_POST['name'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$number=$_POST["num"];
$loginName = $_POST['loginName'];
$pass = $_POST['pass'];

if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/', $pass)) {
    die("Silpnas slaptažodis!");
}

$hashed = password_hash($pass, PASSWORD_DEFAULT);


$stmt = $conn->prepare("INSERT INTO users (name, surname, email, phone, pass, loginname, number) 
                        VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssss", $name, $surname, $email, $phone, $pass, $loginName, $number);
$stmt->execute();

header("Location: loginPage.php");
exit();