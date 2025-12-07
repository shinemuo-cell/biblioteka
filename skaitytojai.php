<?php
include_once 'db.inc.php'; 
session_start();
if ($_SESSION['role'] !== 'admin'&& $_SESSION['role'] !== 'employee') {
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

            if (mysqli_num_rows($users) > 0) {
                while ($user = $users->fetch_assoc()) {
                    ?>
                    <div class="user-block mb-4 p-3 border rounded">
                        <h4><?= htmlspecialchars($user["name"] . " " . $user["surname"]) ?></h4>
                        <p><strong>Email:</strong> <?= htmlspecialchars($user["email"]) ?></p>
                        <p><strong>Tel.:</strong> <?= htmlspecialchars($user["phone"]) ?></p>
                        <p><strong>Nr.:</strong> <?= htmlspecialchars($user["number"]) ?></p>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Pavadinimas</th>
                                    <th>Autorius</th>
                                    <th>Leidimo metai</th>
                                    <th>ISBN</th>
                                    <th>Atidavimo data</th>
                                    <th>Veiksmas</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $books = mysqli_query($conn, "SELECT * FROM taken_books WHERE user_id=" . (int)$user['id']);
                                if (mysqli_num_rows($books) > 0) {
                                    $i = 1;
                                    while ($book = $books->fetch_assoc()) {
                                        ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= htmlspecialchars($book['name']) ?></td>
                                            <td><?= htmlspecialchars($book['author']) ?></td>
                                            <td><?= htmlspecialchars($book['y']) ?></td>
                                            <td><?= htmlspecialchars($book['isbn']) ?></td>
                                            <td><?= htmlspecialchars($book['end_date']) ?></td>
                                            <td>
                                                <a href="deleteUserBook.php?id=<?= $user['id'] ?>&book_name=<?= $book['name'] ?>">
                                                    Grąžinta
                                                </a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    echo '<tr><td colspan="7">Knygų nėra</td></tr>';
                                }
                                ?>
				                <button onclick="addBookForUserOpenForm()">Prideti knyga</button>
                            </tbody>
                        </table>
                    </div>
                    <?php
                }
            } else {
                echo "<p>Skaitytojų nėra</p>";
            }
            ?>
            <div class="formStyle" id="userBook">
                <form action="insertUserBook.php" method="POST">
                    <label>Vartotojo pasirinkimas</label>
                    <?php
                    $sql = "SELECT * FROM users";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);
                    if ($resultCheck > 0) {
                        echo '<select id="userSelect" name="user_id" class="form-select" aria-label="Default select example">';
                        echo '<option value="">Pasirinkite skaitytoją</option>';
                        while ($user = $result->fetch_assoc()) {
                            echo '<option value="' . $user['id'] . '">' . $user['name'] . '</option>';
                        }
                        echo "</select>";
                    }
                    ?>
                    
                    <label>Pasirinkite knygą:</label>
                    <select id="bookSelect" name="book_id">
                        <option value="">Pasirinkite knygą</option>
                    </select>
                    
                    <button type="submit" name="give">Išduoti</button>
                </form>
                <button onclick="addBookForUserCloseForm()">Uždaryti</button>
            </div>
        </main>
        <footer>
            Kaunas, 2025. © Kristina DB, Viltė I., Vasarė M.
        </footer>
        <script src="script.js">
        </script>
    </body>
</html>