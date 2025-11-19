<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Edytuj Post</title>
</head>
<body>
    <?php
        require_once ('config.php');
        session_start();
        if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
            header('Location: login.php');
            exit();
        }
        $postId = htmlspecialchars($_GET['id']);
        $q = "SELECT title, content FROM posts WHERE id = ?";
        $stmt = $con->prepare($q);
        $stmt->bind_param('i', $postId);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
    ?>
    <?php
        $q = "UPDATE posts SET title = ?, content = ? WHERE id = ?";
        $stmt = $con->prepare($q);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $stmt->bind_param('ssi', $title, $content, $postId);
            $stmt->execute();
            header('Location: index.php');
            exit();
            mysqli_close($con);
        }

    ?>
    <div class="blogHeader">
            <h1>MINI CMS -  Edytuj Post</h1>
    </div>
    <div class="blogForm">
    <form method="post">
        <label for="title">Tytuł:</label><br>
        <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($row['title']);?>"><br>
        <label for="content">Treść:</label><br>
        <textarea id="content" name="content" rows="20" cols="130" required><?php echo htmlspecialchars($row['content'])?></textarea><br>
        <button type="submit">Zapisz zmiany</button>
        <button type="none"><a href="admin_panel.php">Wróć do panelu administracyjnego</a></button>
    </form>
    </div>
    <footer>
        <h2>Autorem strony jest <a href="https://github.com/meks990">@Maksymilian Zabłocki</a></h2>
    </footer>
</body>
</html>