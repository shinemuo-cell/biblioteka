<?php
include 'db.inc.php';

$user_id = intval($_GET['user_id']);

$sql = "SELECT b.id, b.title 
        FROM books b
        WHERE b.id NOT IN (
            SELECT id FROM taken_books WHERE user_id = $user_id
        )";

$result = $conn->query($sql);

$books = [];
while($row = $result->fetch_assoc()){
    $books[] = $row;
}

echo json_encode($books);