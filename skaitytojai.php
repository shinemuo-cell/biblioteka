<?php
include_once 'db.inc.php'; 
session_start();
if ($_SESSION['role'] !== 'admin'|| $_SESSION['role'] !== 'employee') {
    die("Neturite prieigos prie šio puslapio!");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bibliotekos valdymo sistema</title>
        <link rel="stylesheet" type="text/css" href="style.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" 
        rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
        crossorigin="anonymous">
    </head>
    <body>
        <header>
            <b><a class="logo">Bibliotekos valdymo sistema</a></b>
            <nav>
                <a class="pageLink" href="books.php">Knygos</a>
                <?php if ($_SESSION["role"] === "admin" || $_SESSION["role"] === "employee"): ?>
                    <a class="pageLink" href="skaitytojai.php">Skaitytojai</a>
                <?php endif; ?>
                <?php if ($_SESSION["role"] === "admin"): ?>
                    <a class="pageLink" href="darbuotojai.php">Darbuotojai</a>
                <?php endif; ?>
                <a class="pageLink" href="logout.php">Atsijungti</a>
            </nav>
        </header>
        <main>
            <?php
                $sql = "SELECT * FROM users";
                $users = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($users);
                if($resultCheck > 0){?>
                    <div id="accordion">
                        <?php while($user = $users->fetch_assoc()): ?>
                        <div class="card">
                        <div class="card-header" id="heading<?= $user['id'] ?>">
                            <h5 class="mb-0">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapse<?= $user['id'] ?>" aria-expanded="false" aria-controls="collapse<?= $user['id'] ?>">
                                <p><?= htmlspecialchars($user["name"] . " " . $user["surname"]) ?></p>
                                <p><?= htmlspecialchars($user["email"])?></p>
                                <p><?= htmlspecialchars($user["phone"])?></p>
                                <p><?= htmlspecialchars($user["number"])?></p>
                            </button>
                            </h5>
                        </div>
                        <div id="collapse<?= $user['id'] ?>" class="collapse" aria-labelledby="heading<?= $user['id'] ?>" data-parent="#accordion">
                            <div class="card-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Pavadinimas</th>
                                    <th scope="col">Autorius</th>
                                    <th scope="col">Leidimo metai</th>
                                    <th scope="col">ISBN</th>
                                    <th scope="col">Atidavimo data</th>
                                </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                <?php
                                $books = $mysqli->query("SELECT * FROM taken_books WHERE user_id=" . (int)$user['id']);
                                if($books->num_rows>0){
                                $i = 1;
                                    while($book = $books->fetch_assoc()):
                                    ?>
                                        <tr>
                                        <th scope="row"><?= $i++ ?></th>
                                        <td><?= htmlspecialchars($book['name']) ?></td>
                                        <td><?= htmlspecialchars($book['author']) ?></td>
                                        <td><?= htmlspecialchars($book['y']) ?></td>
                                        <td><?= htmlspecialchars($book['isbn']) ?></td>
                                        <td><?= htmlspecialchars($book['end_date']) ?></td>
                                        <td><a href="deteteUserBook.php?id=<?= $user['id'] ?>&book_id=<?= $book['name'] ?>">Grazinta</a></td>
                                        </tr>
                                    <?php endwhile;
                                }else{?> <tr><td colspan=6>Knygu nera</td></tr><?php }?>
                                </tbody>
                            </table>
                            </div>
                        </div>
                        </div>
                        <?php endwhile; ?>
                    </div>
                <?php } else {
                    echo "<p>Skaitytoju nera</p>";
                }
            ?>
            <div class="formStyle" id="userBook">
                <form action="insertUserBook.php" method="POST">
                    <label>Vartotojo pasirikimas</label>
                    <?php
                    $sql = "SELECT * FROM users";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);
                    if ($resultCheck>0){
                        echo '<select class="form-select" aria-label="Default select example">';
                        echo "<option selected>Skaitytojas</option>";
                        while($user = $result->fetch_assoc()):
                            echo '<option value="' . $user['id'] . '">' . $user['name'] . '</option>';
                        endwhile; 
                        echo "</select>";
                    }
                    ?>
                    <label>Pasirinkite knygą:</label>
                    <select id="bookSelect" name="book_id">
                        <option value="">Vartotojo pasirinkimas</option>
                    </select>
                    <button type="submit" name="give">Isduoti</button>
                    
                </form>
                <button onclick="newBookCloseForm()">Uždaryti</button>
            </div>
        </main>
        <footer>
            Kaunas, 2025. © Kristina DB, Viltė I., Vasarė M.
        </footer>
        <script src="script.js">
        </script>
    </body>
</html>