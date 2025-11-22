<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Logowanie</title>
</head>
<body class="bg-gray-100 flex flex-col min-h-screen">
    
    <header class="bg-white shadow py-6 mb-10">
        <h1 class="text-center text-3xl font-bold text-gray-800">MINI CMS - Panel logowania</h1>
    </header>

    <div class="flex-grow flex items-center justify-center px-4">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
            <form action="login.php" method="POST" class="space-y-6">
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Nazwa użytkownika:</label>
                    <input type="text" id="username" name="username" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Hasło:</label>
                    <input type="password" id="password" name="password" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>
                
                <div class="flex flex-col gap-3">
                    <button type="submit" class="w-full bg-blue-600 text-white font-bold py-2 rounded-lg hover:bg-blue-700 transition">Zaloguj się</button>
                    <a href="index.php" class="text-center text-sm text-gray-500 hover:text-gray-700">Wróć do strony głównej</a>
                </div>

                <?php
                    require_once('config.php');
                    session_start();

                    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                        header('Location: admin_panel.php');
                        exit();
                    }

                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $username = htmlspecialchars($_POST['username']);
                        $password = htmlspecialchars($_POST['password']);

                        function hash_password($password, $algo) {
                            return password_hash($password, $algo);
                        }
                        

                        if ($username !== null && $password !== null) {
                            if ($username === 'admin' && password_verify($password, hash_password('admin123', PASSWORD_DEFAULT))) {
                                $_SESSION['loggedin'] = true;
                                header('Location: admin_panel.php');
                                exit();
                            } else {
                                echo "<div class='mt-4 p-3 bg-red-100 text-red-700 rounded text-center font-bold'>Nieprawidłowa nazwa użytkownika lub hasło.</div>";
                                $_SESSION['loggedin'] = false;
                            }
                        }
                    }
                ?>
            </form>
        </div>
    </div>

    <footer class="bg-gray-800 text-white text-center py-4 mt-10">
        <h2 class="text-sm">Autorem strony jest <a href="https://github.com/meks990" class="text-blue-400 hover:underline">@Maksymilian Zabłocki</a></h2>
    </footer>
</body>
</html>