<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>MINI CMS</title>
</head>
<body>
    <h1>MINI CMS</h1>
    <a href="login.php">Przejdź do panelu administracyjnego</a>
    <?php
        include 'config.php';
        $result = mysqli_query($con, "SELECT * FROM posts ORDER BY created_at DESC");
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<h2><a href='post.php?id=".$row['id']."'>" . htmlspecialchars($row['title']) . "</a></h2>";
            echo "<p>" . nl2br(htmlspecialchars($row['content'])) . "</p>";
            echo "<hr>";
        }
        mysqli_close($con);
    ?>
    <a href="addpost.php">Dodaj post</a>
</body>
</html>