<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Panel Administracyjny</title>
</head>
<body class="bg-gray-100 text-gray-800">
    <?php
        require_once ('config.php');
        session_start();
        if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
            header('Location: login.php');
            exit();
        }
    ?>
    <div class="bg-white shadow mb-8 py-6">
        <div class="container mx-auto px-4">
            <h1 class="text-3xl font-bold text-gray-800">MINI CMS - Panel Administracyjny</h1>
        </div>
    </div>

    <div class="container mx-auto px-4 max-w-5xl">
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <table class="min-w-full leading-normal">
                <thead>
                    <tr>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">ID</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Tytuł</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Akcje</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $result = mysqli_query($con, "SELECT * FROM posts ORDER BY id DESC");
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr class='hover:bg-gray-50'>";
                        echo "<td class='px-5 py-5 border-b border-gray-200 text-sm'>" . htmlspecialchars($row['id']) . "</td>";
                        echo "<td class='px-5 py-5 border-b border-gray-200 text-sm font-medium'>" . htmlspecialchars($row['title']) . "</td>";
                        echo "<td class='px-5 py-5 border-b border-gray-200 text-sm'>";
                        echo "<a class='text-red-600 hover:text-red-900 mr-4 font-bold cursor-pointer' onclick='return confirm(`Czy napewno chcesz usunąć post o id ".htmlspecialchars($row['id'])."`)' href='delete_post.php?id=".$row['id']."'>Usuń</a>"; 
                        echo "<a class='text-blue-600 hover:text-blue-900 font-bold' href='edit_post.php?id=".$row['id']."'>Edytuj</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                    mysqli_close($con);
                ?>
                </tbody>
            </table>
        </div>

        <div class="mt-8 flex gap-4 justify-center">
            <a href="logout.php" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded transition">Wyloguj się</a>
            <a href="index.php" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded transition">Wróć do strony głównej</a>
        </div>
    </div>

    <footer class="bg-gray-800 text-white text-center py-6 mt-12">
        <h2 class="text-sm">Autorem strony jest <a href="https://github.com/meks990" class="text-blue-400 hover:underline">@Maksymilian Zabłocki</a></h2>
    </footer>
</body>
</html>