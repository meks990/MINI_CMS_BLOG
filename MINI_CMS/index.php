<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>MINI CMS</title>
</head>
<body>
    <div class="blogHeader">
        <h1>MINI CMS</h1>
        <h2><a href="login.php">Przejdź do panelu administracyjnego</a></h2>
    </div>
    <?php
        include 'config.php';
        $result = mysqli_query($con, "SELECT * FROM posts ORDER BY created_at DESC");
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='postContainer'>";
            echo "<header class='postHeader'>";
            echo "<h2><a href='post.php?id=".$row['id']."'>" . htmlspecialchars($row['title']) . "</a></h2>";
            echo "</header>";
            echo "<div class='postContent'>";
            echo "<p>" . nl2br(htmlspecialchars($row['content'])) . "</p>";
            echo "</div>";
            echo "</div>";
        }
        mysqli_close($con);
    ?>
    <button class="addPostButton"><a href="addpost.php">Dodaj post</a></button>

</body>
</html>