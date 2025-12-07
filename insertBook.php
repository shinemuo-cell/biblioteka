<?php
session_start();


include_once 'db.inc.php';


if (isset($_POST['submit'])) {
    

    if ($_SESSION['role'] !== 'admin' && $_SESSION['role'] !== 'employee') {
        header("Location: books.php?error=unauthorized_access");
        exit();
    }

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $author = mysqli_real_escape_string($conn, $_POST['author']);
    $isbn = mysqli_real_escape_string($conn, $_POST['isbn']);
    $y = mysqli_real_escape_string($conn, $_POST['y']);
    $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);


    $sql = "INSERT INTO books (name, author, y, isbn, quantity)
             VALUES ('$name', '$author', '$y', '$isbn', '$quantity');";


    if (mysqli_query($conn, $sql)) {

        header("Location: books.php?success=bookadded");
        exit();
    } else {

        header("Location: books.php?error=db_insert_failed");
        exit();
    }
} else {

    header("Location: books.php");
    exit();
}
?>