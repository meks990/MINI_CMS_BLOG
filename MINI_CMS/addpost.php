<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Dodawanie</title>
</head>
<body>
    <?php
        require_once('config.php');
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $q = "INSERT INTO posts (title, content, created_at) VALUES (?, ?, NOW())";
        $stmt = $con -> prepare($q);
        $stmt -> bind_param('ss', $_POST['title'], $_POST['content']);
        $stmt -> execute();
        mysqli_close($con);
        header('Location: index.php');
        exit();
        }
    ?>
    <form method="POST">
        <label for="title">Tytuł:</label><br>
        <input type="text" id="title" name="title" required><br><br>
        <label for="content">Treść:</label><br>
        <textarea id="content" name="content" rows="10" cols="30" required></textarea><br><br>
        <button type="submit">Wyślij post</button>
    </form>
</body>
</html>