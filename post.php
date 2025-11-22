<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Post</title>
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto px-4 py-8 max-w-4xl">
        <?php
            require_once('config.php');
            $idPost = $_GET['id'];
            $q = "SELECT * FROM posts WHERE id = $idPost";
            $result = mysqli_query($con, $q);
            $post = mysqli_fetch_assoc($result);
            
            if ($post) {
                echo "<div class='bg-white rounded-lg shadow-lg p-8 mb-8'>";
                echo "<header class='mb-6 border-b pb-4'>";
                echo "<h1 class='text-4xl font-bold text-gray-900 mb-2'>" . htmlspecialchars($post['title']) . "</h1>";
                echo "<p class='text-sm text-gray-500'>Opublikowano: " . htmlspecialchars($post['created_at']) . "</p>";
                echo "</header>";
                echo "<div class='prose max-w-none text-gray-700 leading-relaxed mb-6'>";
                echo "<p>" . nl2br(htmlspecialchars($post['content'])) . "</p>";
                echo "</div>";
                echo "</div>";
            } else {
                echo "<div class='bg-red-100 text-red-700 p-4 rounded'>Post not found.</div>";
            }
        ?>

        <div class="mt-10">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold border-l-4 border-blue-500 pl-4">Komentarze</h2>
                <a href='add_comment.php?id=<?php echo $idPost?>' class="bg-blue-500 text-white text-sm font-bold py-2 px-4 rounded hover:bg-blue-600 transition">Dodaj komentarz</a>
            </div>
            
            <div class="space-y-4">
            <?php
                $q = "select * from comments where post_id = $idPost order by created_at desc";
                $result = mysqli_query($con, $q);
                session_start();
                
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='bg-white p-5 rounded border border-gray-200 shadow-sm relative'>";
                    echo "<div class='flex justify-between items-start mb-2'>";
                    echo "<p class='font-bold text-gray-800'>" . htmlspecialchars($row['author']) . " <span class='font-normal text-gray-500 text-sm'>napisał(a):</span></p>";
                    echo "<span class='text-xs text-gray-400'>" . htmlspecialchars($row['created_at']) . "</span>";
                    echo "</div>";
                    echo "<p class='text-gray-700 mb-2'>" . nl2br(htmlspecialchars($row['content'])) . "</p>";
                    
                    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                        echo "<a class='absolute bottom-4 right-4 text-red-500 hover:text-red-700 text-sm font-bold' onclick='return confirm(`Czy napewno chcesz usunąć ten komentarz?`)' href='delete_comment.php?id=".htmlspecialchars($row['id'])."' >USUŃ</a>";     
                    }
                    echo "</div>";
                }
            ?>
            </div>
        </div>

        <div class="mt-8 text-center">
            <a href="index.php" class="text-gray-600 hover:text-gray-900 underline">Wróć do strony głównej</a>
        </div>
    </div>

    <footer class="bg-gray-800 text-white text-center py-6 mt-12">
        <h2 class="text-sm">Autorem strony jest <a href="https://github.com/meks990" class="text-blue-400 hover:underline">@Maksymilian Zabłocki</a></h2>
    </footer>
</body>
</html>