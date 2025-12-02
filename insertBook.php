<?php
include_once 'db.inc.php';

$name = $_POST['name'];
$author = $_POST['author'];
$isbn = $_POST['isbn'];
$y = $_POST['y'];
$quantity = $_POST['quantity'];

$sql = "INSERT INTO books (name,author,y,isbn,quantity)
         VALUES ('$name', '$author', '$y','$isbn', '$quantity'";
mysqli_query($conn,$sql);
header('Location: ../index.php');