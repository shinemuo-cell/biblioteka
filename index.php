<?php

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
            <button type="button" onclick="newBookOpenForm()">Pridėti naują knygą</button>
            <button type="button" onclick="addBookForm()">Papildyti turimą</button>
            <div class="container">
                <table class="table">
                    <thead>
                        <th>Pavadinimas</th>
                        <th>Autorius</th>
                        <th>Leidimo metai</th>
                        <th>ISBN</th>
                        <th>Kiekis</th>
                    </thead>
                    <tbody><!-- svetaine programuojama html bet reikalingas php todel failas php o kodas html-->
                        <?php
                        if(empty($allBooks)){
                            echo "<td colspan=5>Duomenu nerasta</td>";
                        }else{
                            foreach ($allBooks as $book) {
                                echo "<td>".htmlspecialchars($row["name"])."</td>";
                                echo "<td>".htmlspecialchars($row["author"])."</td>";
                                echo "<td>".htmlspecialchars($row["isbn"])."</td>";
                                echo "<td>".htmlspecialchars($row["y"])."</td>";
                                echo "<td>".htmlspecialchars($row["quantity"])."</td>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <form id="newBook" class="newBookStyle" action="formhandler.inc.php" method="post">
                <div class="formContent">
                    <h3>Knygos informacija</h3>
                    <label>Knygos pavadinimas</label>
                    <input type="text" id="name" name="name"><br>
                    <label>Autorius</label>
                    <input type="text" id="author" name="author"><br>
                    <label>ISBN</label>
                    <input type="text" id="isbn" name="isbn"><br>
                    <label>Leidimo metai</label>
                    <input type="number" id="year" name="year"><br>
                    <label>Kiekis</label>
                    <input type="text" id="quantity" name="quantity"><br>
                    <button onclick="newBookSubmit()">Pridėti</button>
                    <button onclick="newBookCloseForm()">Uždaryti</button>
                </div>
            </form>
        </main>
        <footer>
            Kaunas, 2025. © Kristina DB, Viltė I., Vasarė M.
        </footer>
        <script src="script.js">
        </script>
    </body>
</html>