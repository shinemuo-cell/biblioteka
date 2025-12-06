<?php
include 'db.inc.php';

if(isset($_POST['give'])){
    $user_id = intval($_POST['user_id']);
    $book_id = intval($_POST['book_id']);

    $check = $conn->query("SELECT * FROM taken_books WHERE user_id=$user_id AND id=$book_id");

    if($check->num_rows == 0){
        $conn->query("INSERT INTO taken_books (user_id, id) VALUES ($user_id, $book_id)");
    }
}
header("Location: ../skaitytojai.php");