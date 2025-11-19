<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Usuwanie</title>
</head>
<body>
    <?php
        require_once ('config.php');
        session_start();
        if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
            header('Location: login.php');
            exit();
        }
        if (isset($_GET['id'])) {
            $id = htmlspecialchars($_GET['id']);
            $q = "DELETE FROM posts WHERE id = ?";
            $stmt = $con->prepare($q);
            $stmt->bind_param("i", $id);
            if ($stmt->execute()) {
                header('Location: admin_panel.php');
                exit();
            } else {
                echo "Błąd podczas usuwania posta.";
            }
            $stmt->close();
        } else {
            echo "Nieprawidłowe żądanie.";
        }
    ?>
</body>
</html>