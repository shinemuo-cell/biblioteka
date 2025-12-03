<?php
include_once 'db.inc.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Knygos</title>
        <link rel="stylesheet" type="text/css" href="style.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" 
        rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
        crossorigin="anonymous">
    </head>
    <body>
        <header>
            <b><a class="logo">Bibliotekos valdymo sistema</a></b>
            <nav>
                <a class="pageLink">Knygos</a>
                <a class="pageLink">Skaitytojai</a>
                <a class="pageLink">Darbuotojai</a>
                <a class="pageLink">Atsijungti</a>
            </nav>
        </header>
        <main>
            <h1>Knygos</h1>
            <div class="buttonContainer">
                <button type="button" onclick="newBookOpenForm()">Pridėti naują knygą</button>
                <button type="button" onclick="addBookOpenForm()">Papildyti turimą</button>
            </div>
            <div class="container">
                <table class="table">
                    <thead class="table-light">
                        <th>Pavadinimas</th>
                        <th>Autorius</th>
                        <th>Leidimo metai</th>
                        <th>ISBN</th>
                        <th>Kiekis</th>
                    </thead>
                    <tbody><!-- svetaine programuojama html bet reikalingas php todel failas php o kodas html-->
                        <?php
                        $sql="SELECT * FROM books;";
                        $result=mysqli_query($conn,$sql);
                        $resultCheck = mysqli_num_rows($result);
                        if($resultCheck>0){
                            while($row=mysqli_fetch_assoc($result)){
                                echo "<tr>
                                <td>". $row["name"]."</td>
                                <td>". $row["author"]."</td>
                                <td>". $row["y"]."</td>
                                <td>". $row["isbn"]."</td>
                                <td>". $row["quantity"]."</td>
                                </tr>";
                            }
                        }else{
                            echo "<tr><td colspan=5>Duomenų nėra</td></tr>";
                        }
                        
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="formStyle" id="newBook" >
                <form action="insertBook.php" method="POST">
                    <div class="formContent">
                        <h3>Knygos informacija</h3>
                        <label>Knygos pavadinimas</label><br>
                        <input type="text" id="name" name="name"><br>
                        <label>Autorius</label><br>
                        <input type="text" id="author" name="author"><br>
                        <label>ISBN</label><br>
                        <input type="text" id="isbn" name="isbn"><br>
                        <label>Leidimo metai</label><br>
                        <input type="number" id="year" name="y"><br>
                        <label>Kiekis</label><br>
                        <input type="text" id="quantity" name="quantity"><br>
                        <button type="submit" name="submit" >Pridėti</button><br>
                    </div>
                </form>
                <button onclick="newBookCloseForm()">Uždaryti langą</button>
            </div>
            <div class="formStyle" id="addBook">
                <form action="addBook.php" mode="POST">
                    <div class="formContainer">
                        <label>Pasirinkite knygą</label><br>
                        <select name="bookNames" id="addBook"><br>
                            <?php
                            $sql="SELECT * FROM books;";
                            $result=mysqli_query($conn,$sql);
                            $resultCheck = mysqli_num_rows($result);
                            if($resultCheck>0){
                                while($row=mysqli_fetch_assoc($result)){
                                    echo "<option name=" .$row["name"].">
                                    ".$row["name"]."</option>";
                                }
                            }else{
                                echo "<option value=noBooks>Nera knygu</option>";
                            }
                            
                            ?>
                        </select>
                        <label>Įveskite kiekį</label><br>
                        <input type="text" name="addQuantity"><br>
                        <button type="submit" name="submit" >Pridėti</button><br>
                    </div>
                </form>
                <button onclick="addBookCoseForm()">Uzdaryti</button>
            </div>
        </main>
        <footer>
            Kaunas, 2025. © Kristina DB, Viltė I., Vasarė M.
        </footer>
        <script src="script.js">
        </script>
    </body>
</html>