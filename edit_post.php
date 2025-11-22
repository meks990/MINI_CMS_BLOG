<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Edytuj Post</title>
</head>
<body class="bg-gray-100 text-gray-800 flex flex-col min-h-screen">
    <?php
        require_once ('config.php');
        session_start();
        
        // Sprawdzenie czy użytkownik jest zalogowany
        if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
            header('Location: login.php');
            exit();
        }

        $postId = htmlspecialchars($_GET['id']);

        // Pobranie aktualnych danych posta
        $q = "SELECT title, content FROM posts WHERE id = ?";
        $stmt = $con->prepare($q);
        $stmt->bind_param('i', $postId);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        // Obsługa zapisu zmian
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $q_update = "UPDATE posts SET title = ?, content = ? WHERE id = ?";
            $stmt_update = $con->prepare($q_update);
            
            $title = $_POST['title'];
            $content = $_POST['content'];
            
            $stmt_update->bind_param('ssi', $title, $content, $postId);
            $stmt_update->execute();
            
            header('Location: index.php'); // Przekierowanie po edycji (można zmienić na admin_panel.php)
            exit();
        }
        
        // Zamknięcie połączenia dopiero na końcu (opcjonalne, PHP robi to automatycznie)
        // mysqli_close($con); 
    ?>

    <header class="bg-white shadow py-6 mb-10">
        <div class="container mx-auto px-4">
            <h1 class="text-2xl font-bold text-gray-800">MINI CMS - Edytuj Post</h1>
        </div>
    </header>

    <div class="flex-grow container mx-auto px-4 max-w-4xl">
        <div class="bg-white p-8 rounded-lg shadow-lg">
            <form method="post" class="flex flex-col gap-6">
                
                <div>
                    <label for="title" class="block text-sm font-bold text-gray-700 mb-2">Tytuł:</label>
                    <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($row['title']);?>" 
                           class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                </div>
                
                <div>
                    <label for="content" class="block text-sm font-bold text-gray-700 mb-2">Treść:</label>
                    <textarea id="content" name="content" rows="15" 
                              class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" required><?php echo htmlspecialchars($row['content'])?></textarea>
                </div>
                
                <div class="flex items-center justify-between pt-4">
                    <a href="admin_panel.php" class="text-gray-500 hover:text-gray-800 transition">Anuluj</a>
                    <button type="submit" class="bg-blue-600 text-white font-bold py-2 px-6 rounded-lg hover:bg-blue-700 transition shadow">Zapisz zmiany</button>
                </div>

            </form>
        </div>
    </div>

    <footer class="bg-gray-800 text-white text-center py-6 mt-10">
        <h2 class="text-sm">Autorem strony jest <a href="https://github.com/meks990" class="text-blue-400 hover:underline">@Maksymilian Zabłocki</a></h2>
    </footer>
</body>
</html>