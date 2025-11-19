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
        }else {
            echo "użytkownik zalogowany";
        } 
    ?>
    <table>
        <?php
            $result = mysqli_query($con, "SELECT * FROM posts ORDER BY created_at DESC");
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                echo "<td>" . htmlspecialchars($row['title']) . "</td>";
                echo "<td> <a href='delete.php?id=".$row['id']."'>Usuń</a> | <a href='edit.php?id=".$row['id']."'>Edytuj</a></td>";
                echo "</tr>";
            }
            mysqli_close($con);
        ?>
    </table>
    <form method="POST">
    <button type="submit" name="logout"><a href="logout.php">Wyloguj się</a></button>
    </form>
</body>
</html>
