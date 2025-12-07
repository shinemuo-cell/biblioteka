<?php
include 'db.inc.php';

$user_id = $_GET['id'];
$book_name = $_GET['book_name'];

$sql = "DELETE FROM taken_books WHERE user_id = ? AND name = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("is", $user_id, $book_name);
$stmt->execute();

header("Location: skaitytojai.php");
