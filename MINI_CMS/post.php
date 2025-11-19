<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Post</title>
</head>
<body>
    <?php
        require_once('config.php');
        $idPost = $_GET['id'];
        $q = "SELECT * FROM posts WHERE id = $idPost";
        $result = mysqli_query($con, $q);
        $post = mysqli_fetch_assoc($result);
        if ($post) {
            echo "<div class='postContainer'>";
            echo "<header class='postHeader'>";
            echo "<h1>" . htmlspecialchars($post['title']) . "</h1>";
            echo "</header>";
            echo "<div class='postContent2'>";
            echo "<p>" . nl2br(htmlspecialchars($post['content'])) . "</p>";
            echo "</div>";
            echo "<p class='postDate'>Opublikowano: " . htmlspecialchars($post['created_at']) . "</p>";
            echo "</div>";
        } else {
            echo "<p>Post not found.</p>";
        }
    ?>
    <a href="index.php"><button>Wróć do strony głównej</button></a>
    <footer>
        <h2>Autorem strony jest <a href="https://github.com/meks990">@Maksymilian Zabłocki</a></h2>
    </footer>
</body>
</html>