<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name = $_POST["name"];
    $author = $_POST["author"];
    $year = $_POST["year"];
    $isbn = $_POST["isbn"];
    $quantity = $_POST["quantity"];
    //gaunami duomenys is lenteles

    try{
        require_once "db.inc.pdp";//kodo integravimas
        $query = "INSERT INTO books (name, author, isbn, y, quantity) 
        VALUES(:name, :author, :isbn, :year, :quantity);";// ^ stulpelio pavadinimas, sql komanda
        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":author", $author);
        $stmt->bindParam(":isbn", $isbn);
        $stmt->bindParam(":y", $year);
        $stmt->bindParam(":quantity", $quantity);
        $stmt->execute();
        $pdo=null;
        $stmt=null;
        //duomenys perduodami taip, kad negalima butu atlikti injection atakos

    }catch(PDOExeption $e){
        die("Query failed: " . $e->getMessage());
    }
}