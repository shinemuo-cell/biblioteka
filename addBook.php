<?php
include_once 'db.inc.php';

$name = $_POST['name'];
$quantity = $_POST['quantity'];

$sql = "UPDATE books SET quantity='$quantity' WHERE name='$name';";
mysqli_query($conn,$sql);
header("Location: ../index.php");