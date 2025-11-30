<?php
try{
    require_once "db.inc.pdp";//kodo integravimas
    $query = "SELECT * FROM books";
    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":name", $name);
    $stmt->bindParam(":author", $author);
    $stmt->bindParam(":isbn", $isbn);
    $stmt->bindParam(":y", $year);
    $stmt->bindParam(":quantity", $quantity);
    $stmt->execute();
    $allBooks = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $pdo=null;
    $stmt=null;
    //duomenys perduodami taip, kad negalima butu atlikti injection atakos

}catch(PDOExeption $e){
    die("Query failed: " . $e->getMessage());
}
