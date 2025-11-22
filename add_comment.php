<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Dodaj komentarz</title>
</head>
<body class="bg-gray-100 text-gray-800 flex flex-col min-h-screen">
    <?php
        require_once('config.php');
        // Pobieramy ID posta, do którego dodajemy komentarz
        $idPost = isset($_GET['id']) ? $_GET['id'] : null;

        if($_SERVER['REQUEST_METHOD'] === 'POST' && $idPost) {
            $q = "INSERT INTO comments (post_id, author, content, created_at) VALUES (?, ?, ?, NOW())";
            $stmt = $con -> prepare($q);
            $stmt -> bind_param('iss', $idPost, $_POST['author'], $_POST['content']);
            $stmt -> execute();
            mysqli_close($con);
            
            // Powrót do posta po dodaniu komentarza
            header("Location: post.php?id=$idPost");
            exit();
        }
    ?>

    <header class="bg-white shadow py-6 mb-10">
        <div class="container mx-auto px-4">
             <h1 class="text-2xl font-bold text-gray-800">MINI CMS - Dodaj Komentarz</h1>
        </div>
    </header>

    <div class="flex-grow container mx-auto px-4 max-w-2xl">
        <div class="bg-white p-8 rounded-lg shadow-lg">
            <form method="POST" class="flex flex-col gap-5">
                
                <div>
                    <label for="author" class="block text-sm font-bold text-gray-700 mb-2">Twój podpis (Autor):</label>
                    <input type="text" id="author" name="author" placeholder="Imię lub nick" required
                           class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>
                
                <div>
                    <label for="content" class="block text-sm font-bold text-gray-700 mb-2">Treść komentarza:</label>
                    <textarea id="content" name="content" rows="6" placeholder="Napisz co myślisz..." required
                              class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"></textarea>
                </div>
                
                <div class="flex items-center justify-between pt-4">
                    <a href="post.php?id=<?php echo $idPost; ?>" class="text-gray-500 hover:text-gray-800 transition">Wróć do posta</a>
                    <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-6 rounded-lg hover:bg-blue-600 transition shadow">Opublikuj</button>
                </div>

            </form>
        </div>
    </div>

    <footer class="bg-gray-800 text-white text-center py-6 mt-10">
        <h2 class="text-sm">Autorem strony jest <a href="https://github.com/meks990" class="text-blue-400 hover:underline">@Maksymilian Zabłocki</a></h2>
    </footer>
</body>
</html>