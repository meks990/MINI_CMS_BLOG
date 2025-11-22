<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Dodawanie Posta</title>
</head>
<body class="bg-gray-100 text-gray-800 flex flex-col min-h-screen">
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
    
    <header class="bg-white shadow py-6">
        <div class="container mx-auto px-4">
             <h1 class="text-2xl font-bold text-gray-800">MINI CMS - Dodaj Post</h1>
        </div>
    </header>

    <div class="flex-grow container mx-auto px-4 py-8 max-w-3xl">
        <div class="bg-white p-8 rounded-lg shadow-lg">
            <form method="POST" class="flex flex-col gap-6">
                <div>
                    <label for="title" class="block text-sm font-bold text-gray-700 mb-2">Tytuł:</label>
                    <input type="text" id="title" name="title" placeholder="Tytuł twojego artykułu" required class="w-full border border-gray-300 rounded-lg px-4 py-2  focus:outline-none focus:ring-2 focus:ring-green-400">
                </div>
                
                <div>
                    <label for="content" class="block text-sm font-bold text-gray-700 mb-2">Treść:</label>
                    <textarea id="content" name="content" rows="10" placeholder="Treść twojego artykułu" required  class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-400"></textarea>
                </div>
                
                <div class="flex items-center justify-between pt-4">
                    <a href="index.php" class="text-gray-500 hover:text-gray-800 transition">Anuluj i wróć</a>
                    <button type="submit" class="bg-green-500 text-white font-bold py-2 px-6 rounded-lg hover:bg-green-600 transition shadow">Wyślij post</button>
                </div>
            </form>
        </div>
    </div>

    <footer class="bg-gray-800 text-white text-center py-6">
        <h2 class="text-sm">Autorem strony jest <a href="https://github.com/meks990" class="text-blue-400 hover:underline">@Maksymilian Zabłocki</a></h2>
    </footer>
</body>
</html>