<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>MINI CMS</title>
</head>
<body class="bg-gray-100 text-gray-800 font-sans">
    
    <div class="bg-white shadow mb-8">
        <div class="container mx-auto px-4 py-6 flex flex-col md:flex-row justify-between items-center">
            <div>
                <h1 class="text-3xl font-bold text-blue-600">MINI CMS</h1>
                <h2 class="text-sm mt-1"><a href="login.php" class="text-gray-500 hover:text-blue-500 transition">Przejdź do panelu administracyjnego</a></h2>
            </div>
            <form method="POST" class="mt-4 md:mt-0 flex gap-2">
                <input class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" type="text" name="search" placeholder="Szukaj postów..." >
                <button class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition" type="submit">Szukaj</button>
            </form>
        </div>
    </div>

    <div class="container mx-auto px-4 max-w-4xl">
    <?php
        require_once('config.php');
        // (Logika PHP bez zmian)
        if(isset($_POST['search']) && !empty($_POST['search'])) {
            $q = "SELECT * FROM posts WHERE content LIKE '%".$_POST['search']."%' OR title LIKE '%".$_POST['search']."%' ORDER BY created_at DESC";
        } else {
            $q = "SELECT * FROM posts ORDER BY created_at DESC";
        }
        
        $result = mysqli_query($con, $q);
        while ($row = mysqli_fetch_assoc($result)) {
            // Karta Posta
            echo "<div class='bg-white rounded-lg shadow-md p-6 mb-6 transition hover:shadow-lg'>";
            echo "<header class='mb-4 border-b pb-2'>";
            echo "<h2 class='text-2xl font-bold text-gray-800'><a href='post.php?id=".$row['id']."' class='hover:text-blue-600 transition'>" . htmlspecialchars($row['title']) . "</a></h2>";
            echo "</header>";
            echo "<div class='text-gray-700 leading-relaxed'>";
            // Skracanie tekstu dla podglądu (opcjonalne, tu zostawiamy full jak w oryginale)
            echo "<p>" . nl2br(htmlspecialchars($row['content'])) . "</p>";
            echo "</div>";
            echo "</div>";
        }
        mysqli_close($con);
    ?>
    
    <div class="my-8 text-center">
        <a href="add_post.php">
            <button class="bg-green-500 text-white font-bold py-3 px-6 rounded-lg shadow hover:bg-green-600 transition transform hover:-translate-y-0.5">Dodaj nowy post</button>
        </a>
    </div>
    </div>

    <footer class="bg-gray-800 text-white text-center py-6 mt-12">
        <h2 class="text-sm">Autorem strony jest <a href="https://github.com/meks990" class="text-blue-400 hover:underline">@Maksymilian Zabłocki</a></h2>
    </footer>
</body>
</html>