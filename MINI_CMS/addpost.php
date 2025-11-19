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
    <div class="blogHeader">
            <h1>MINI CMS -  Dodaj Post</h1>
    </div>
    <div class="blogForm">
    <form method="POST">
        <label for="title">Tytuł:</label><br>
        <input type="text" id="title" name="title" placeholder="Tytuł twojego artykułu" required><br><br>
        <label for="content">Treść:</label><br>
        <textarea id="content" name="content" rows="10" cols="30" placeholder="Treść twojego artykułu" required></textarea><br><br>
        <button type="submit">Wyślij post</button>
        <button type="none"><a href="index.php">Wróć do strony głównej</a></button>
    </form>
    </div>
    <footer>
        <h2>Autorem strony jest <a href="https://github.com/meks990">@Maksymilian Zabłocki</a></h2>
    </footer>
</body>
</html>