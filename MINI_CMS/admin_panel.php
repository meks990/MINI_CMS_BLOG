<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Panel Administracyjny</title>
</head>
<body>
    <?php
        require_once ('config.php');
        session_start();
        if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
            header('Location: login.php');
            exit();
        }
    ?>
    <div class="blogHeader">
        <h1>MINI CMS - Panel Administracyjny</h1>
    </div>
    <table class="adminPanel">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tytuł</th>
                <th>Akcje</th>
            </tr>
        <?php
            $result = mysqli_query($con, "SELECT * FROM posts ORDER BY id DESC");
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                echo "<td>" . htmlspecialchars($row['title']) . "</td>";
                echo "<td> <a class='delete' onclick='return confirm(`Czy napewno chcesz usunąć post o id ".htmlspecialchars($row['id'])."`)' href='delete_post.php?id=".$row['id']."'>Usuń</a> | <a class='edit' href='edit_post.php?id=".$row['id']."'>Edytuj</a></td>";
                echo "</tr>";
            }
            mysqli_close($con);
        ?>
    </table>
    <br>
    <a href="logout.php"><button name="logout">Wyloguj się</button></a>
    <a href="index.php"><button>Wróć do strony głównej</button></a>
    <footer>
        <h2>Autorem strony jest <a href="https://github.com/meks990">@Maksymilian Zabłocki</a></h2>
    </footer>
</body>
</html>
