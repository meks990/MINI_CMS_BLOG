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
        <form method="POST">
            <input  class="searchInput" type="text" name="search" placeholder="Szukaj postów..." >
            <button class="searchButton" type="submit"><img src="search.png" alt="Szukaj postów"></button>
        </form>
    </div>
    <?php
        require_once('config.php');
        if(isset($_POST['search']) && !empty($_POST['search'])) {
            $q = "SELECT * FROM posts WHERE content LIKE '%".$_POST['search']."%' OR title LIKE '%".$_POST['search']."%' ORDER BY created_at DESC";
            $result = mysqli_query($con, $q);
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
        } else
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
    <a href="addpost.php"><button class="addPostButton">Dodaj post</button></a>
    <footer>
        <h2>Autorem strony jest <a href="https://github.com/meks990">@Maksymilian Zabłocki</a></h2>
    </footer>
</body>
</html>