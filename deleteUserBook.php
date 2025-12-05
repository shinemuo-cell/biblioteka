<?php
include 'db.php';

$user_id = $_GET['id'];
$book_id = $_GET['book_id'];

$sql = "DELETE FROM taken_book WHERE user_id = ? AND name = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $user_id, $book_id);
$stmt->execute();

header("Location: ../skaitytojai.php");
