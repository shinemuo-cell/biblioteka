<?php
include_once 'db.inc.php'; 
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Pagrindinis</title>
        <link rel="stylesheet" type="text/css" href="style.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" 
        rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
        crossorigin="anonymous">
    </head>
    <body>
        <header>
            <b><a class="logo" href="index.php">Bibliotekos valdymo sistema</a></b>
            <nav>
                <a class="pageLink" href="index.php">Pagrindinis</a>
                <a class="pageLink" href="loginPage.php" >Prisijungti</a> 
            </nav>
        </header>
        
        <main>
            <form action="insertUser.php" method="POST">
                <div class="mb-3">
                    <label for="name" class="form-label">Vardas</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="surname" class="form-label">Pavardė</label>
                    <input type="text" class="form-control" id="surname" name="surname" required>
                </div>
                <div class="mb-3">
                    <label for="mail" class="form-label">Paštas</label>
                    <input type="email" class="form-control" id="mail" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Tel. numeris</label>
                    <input type="tel" class="form-control" id="phone" name="phone" pattern="\+3706[0-9]{7}" placeholder="+37060000000" required>
                </div>
                <div class="mb-3">
                    <label for="loginName" class="form-label">Prisijungimo vardas</label>
                    <input type="text" class="form-control" id="loginName" name="loginName" required>
                </div>
                <div class="mb-3">
                    <label for="pass" class="form-label">Slaptažodis</label>
                    <div style="display: flex; align-items: center;">
                        <input type="password" class="form-control" id="pass" name="pass" required
                        pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}">
                        <button type="button" id="togglePass" class="btn-universal" style="margin-left: 5px;">
                            Rodyti
                        </button>
                    </div>
                    <small id="passHelp" class="form-text text-muted"></small>
                </div>
                <div class="mb-3">
                    <label for="num" class="form-label">Pažymėjimo numeris</label>
                    <input name="num" type="number" class="form-control" id="num" required>
                </div>
                <button type="submit" class="btn-universal">Sukurti paskyrą</button>
            </form>
        </main>
        
        <footer>
            Kaunas, 2025. © Kristina DB, Viltė I., Vasarė M.
        </footer>

        <script src="script.js" defer></script>  
    </body>
</html>