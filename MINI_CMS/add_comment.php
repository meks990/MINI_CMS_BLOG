<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Dodaj komentarz</title>
</head>
<body>
    <?php
        require_once('config.php');
        $idPost = $_GET['id'];
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $q = "INSERT INTO comments (post_id, author, content, created_at) VALUES (?, ?, ?, NOW())";
        $stmt = $con -> prepare($q);
        $stmt -> bind_param('iss', $idPost, $_POST['author'], $_POST['content']);
        $stmt -> execute();
        mysqli_close($con);
        header("Location: post.php?id=$idPost");
        exit();
        }
    ?>
    <div class="blogHeader">
            <h1>MINI CMS -  Dodaj Komentarz</h1>
    </div>
    <div class="blogForm">
    <form method="POST">
        <label for="author">Autor:</label><br>
        <input type="text" id="author" name="author" placeholder="Twoje imię" required><br><br>
        <label for="content">Treść komentarza:</label><br>
        <textarea id="content" name="content" rows="10" cols="30" placeholder="Treść twojego komentarza" required></textarea><br><br>
        <button type="submit">Wyślij komentarz</button>
        <button type="none"><a href="post.php?id=<?php echo $idPost?>">Wróć do posta</a></button>
    </form>
    </div>
    <footer>
        <h2>Autorem strony jest <a href="https://github.com/meks990">@Maksymilian Zabłocki</a></h2>
    </footer>
</body>
</html>