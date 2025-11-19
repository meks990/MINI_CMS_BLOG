<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Logowanie</title>
</head>
<body>
    <header class="blogHeader">
        <h1>MINI CMS - Panel logowania</h1>
    </header>
    <div class="loginForm">
    <form action="login.php" method="POST">
        <label for="username">Nazwa użytkownika:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Hasło:</label>
        <input type="password" id="password" name="password" required><br><br>
        <button type="submit">Zaloguj się</button>
        <button><a href="index.php">Wróć do strony głównej</a></button>
        <?php
            require_once('config.php');
            session_start();

            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                header('Location: admin.php');
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
                        header('Location: admin.php');
                        exit();
                    } else {
                        echo "<br><br>";
                        echo "<p style='color:red; font-weight:bold;'>Nieprawidłowa nazwa użytkownika lub hasło.</p>";
                        $_SESSION['loggedin'] = false;
                    }
                }
            }
        ?>
    </form>
    </div>
    <footer>
        <h2>Autorem strony jest <a href="https://github.com/meks990">@Maksymilian Zabłocki</a></h2>
    </footer>
</body>
</html>