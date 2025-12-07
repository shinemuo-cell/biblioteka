<?php
include 'db.inc.php';

if(isset($_POST['give'])) {
    $user_id = (int)$_POST['user_id'];
    $book_id = (int)$_POST['book_id'];

    $bookSql = "SELECT * FROM books WHERE id=$book_id LIMIT 1";
    $bookRes = mysqli_query($conn, $bookSql);
    $book = $bookRes->fetch_assoc();

    if($book && $book['quantity'] > 0) {
        $end_date = date('Y-m-d', strtotime('+30 days'));

        $insertSql = "INSERT INTO taken_books (user_id, id, name, author, isbn, y, end_date) 
                      VALUES ($user_id, $book_id, 
                              '".mysqli_real_escape_string($conn, $book['name'])."', 
                              '\".mysqli_real_escape_string($conn, $book['author']).\"', 
                              '\".mysqli_real_escape_string($conn, $book['isbn']).\"', 
                              '\".mysqli_real_escape_string($conn, $book['y']).\"', 
                              '$end_date')";
        mysqli_query($conn, $insertSql);

        $updateQuantitySql = "UPDATE books SET quantity = quantity - 1 WHERE id = $book_id";
        mysqli_query($conn, $updateQuantitySql);
    }

    header("Location: skaitytojai.php");
    exit;
}