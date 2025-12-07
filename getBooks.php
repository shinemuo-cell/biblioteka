<?php
include 'db.inc.php';

$user_id = (int)$_GET['user_id'];

$sql = "SELECT b.id AS id, b.name AS name, b.author AS author
        FROM books b
        WHERE b.id NOT IN (
            SELECT id FROM taken_books WHERE user_id = $user_id
        ) AND b.quantity > 0";

$result = mysqli_query($conn, $sql);

$books = [];
while($row = $result->fetch_assoc()) {
    $books[] = $row;
}

header('Content-Type: application/json');
echo json_encode($books);