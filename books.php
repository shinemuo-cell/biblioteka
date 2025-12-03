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
                <button type="button" onclick="addBookOpenForm()">Padidinti knygos kiekį</button>
            </div>
            
            <div class="container mt-4">
                <table class="table table-striped table-dark">
                    <thead>
                        <tr>
                            <th>Pavadinimas</th>
                            <th>Autorius</th>
                            <th>ISBN</th>
                            <th>Metai</th>
                            <th>Kiekis</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
 
                            $sql = "SELECT * FROM books ORDER BY name ASC;";
                            $result = mysqli_query($conn, $sql);
                            $resultCheck = mysqli_num_rows($result);

                            if($resultCheck > 0){
                                while($row = mysqli_fetch_assoc($result)){
                                    echo "<tr>";
                                    echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['author']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['isbn']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['y']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['quantity']) . "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='5' class='text-center'>Bibliotekoje knygų nėra.</td></tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="formStyle" id="newBook">
                <form action="insertBook.php" method="POST">
                    <div class="formContainer">
                        <h3>Pridėti naują knygą</h3>
                        <label>Pavadinimas</label><br>
                        <input type="text" name="name" required><br>
                        <label>Autorius</label><br>
                        <input type="text" name="author" required><br>
                        <label>ISBN</label><br>
                        <input type="text" name="isbn" required><br>
                        <label>Leidimo metai (Y)</label><br>
                        <input type="number" name="y" required><br>
                        <label>Kiekis</label><br>
                        <input type="number" name="quantity" required><br>
                        <button type="submit" name="submit" >Pridėti</button><br>
                    </div>
                </form>
                <button onclick="newBookCloseForm()">Uždaryti</button>
            </div>
            <div class="formStyle" id="addBook">
                <form action="addBook.php" method="POST">
                    <div class="formContainer">
                        <h3>Padidinti knygos kiekį</h3>
                        <label>Pasirinkite knygą</label><br>
                        <select name="bookNames"><br>
                            <?php
                            $sql="SELECT * FROM books ORDER BY name ASC;"; 
                            $result=mysqli_query($conn,$sql);
                            $resultCheck = mysqli_num_rows($result);
                            if($resultCheck>0){
                                while($row=mysqli_fetch_assoc($result)){
                                    echo "<option value=\"" . htmlspecialchars($row["name"]) . "\">" . htmlspecialchars($row["name"]) . "</option>";
                                }
                            }else{
                                echo "<option value='noBooks'>Nėra knygų</option>";
                            }
                            ?>
                        </select>
                        <label>Pridėti kiekį (teigiamas skaičius)</label><br>
                        <input type="number" name="addQuantity" min="1" required><br>
                        <button type="submit" name="submit" >Pridėti</button><br>
                    </div>
                </form>
                <button onclick="addBookCloseForm()">Uždaryti</button>
            </div>
            </main>
        <footer>
            Kaunas, 2025. © Kristina DB, Viltė I., Vasarė M.
        </footer>
        <script src="script.js">
        </script>
    </body>
</html>