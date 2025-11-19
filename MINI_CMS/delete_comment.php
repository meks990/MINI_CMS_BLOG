<?php
    require_once ('config.php');
    session_start();
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
        header('Location: login.php');
        exit();
    }
    if (isset($_GET['id'])) {
        $id = htmlspecialchars($_GET['id']);
        $q = "DELETE FROM comments WHERE id = ?";
        $stmt = $con->prepare($q);
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            header('Location: index.php');
            exit();
        } else {
            echo "Błąd podczas usuwania komentarza.";
        }
        $stmt->close();
    } else {
        echo "Nieprawidłowe żądanie.";
    }
?>