<?php
include 'db.inc.php';


$user_id = $_GET['id'];
$book_name = $_GET['book_name'];

$book_id = $_GET['book_id'] ?? null; 

$sql = "DELETE FROM taken_books WHERE user_id = ? AND name = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("is", $user_id, $book_name);
$stmt->execute();
$stmt->close();

if ($book_id) {
    $updateQuantitySql = "UPDATE books SET quantity = quantity + 1 WHERE id = ?";
    $stmt_update = $conn->prepare($updateQuantitySql);
    $stmt_update->bind_param("i", $book_id);
    $stmt_update->execute();
    $stmt_update->close();
}

header("Location: skaitytojai.php");
exit();