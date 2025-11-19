-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Lis 19, 2025 at 01:49 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `author` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `created_at`) VALUES
(3, 'Jak znaleźć motywację do codziennego programowania?', 'Motywacja w programowaniu to temat, który wraca jak bumerang, zwłaszcza u osób uczących się samodzielnie. Łatwo wpaść w pułapkę przeglądania nieskończonych tutoriali, a trudno utrzymać regularność w praktyce. Jednym z najskuteczniejszych sposobów na utrzymanie motywacji jest ustalenie małych, konkretnych celów. Zamiast obiecywać sobie, że napiszesz własną aplikację społecznościową, postaw na coś mniejszego, jak implementacja jednego widoku lub funkcji. Małe sukcesy budują pewność siebie i zwiększają chęć do dalszej pracy.\r\n\r\nDrugim ważnym elementem jest budowanie rutyny. Nawet 20–30 minut dziennie potrafi zdziałać cuda, jeśli staje się nawykiem. Podobnie jak w nauce języka obcego, regularność jest kluczowa. Kiedy kodowanie wejdzie Ci w krew, stanie się naturalną częścią dnia.\r\n\r\nWarto również dokumentować postępy. Może to być dziennik, repozytorium, blog lub nawet krótkie wpisy na social mediach. Widząc, jak wiele zrobiłeś w ostatnich tygodniach, nabierzesz energii, by iść dalej.\r\n\r\nNie zapominaj też o społeczności. Programowanie nie musi być samotną drogą — fora, grupy i platformy pomagają utrzymać motywację oraz dają możliwość zadawania pytań, wymiany wiedzy i obserwowania pracy bardziej doświadczonych osób.\r\n\r\nNajważniejsze jednak jest to, by programowanie sprawiało Ci przyjemność. Jeśli projekt, nad którym pracujesz, Cię nudzi — zmień go. Motywacja rodzi się tam, gdzie pojawia się ciekawość.', '2025-11-18 20:32:31'),
(4, 'Dlaczego małe projekty uczą najwięcej?', 'W świecie programowania często mówi się o wielkich aplikacjach, ogromnych systemach i skomplikowanych architekturach, ale prawda jest taka, że to właśnie małe projekty uczą najwięcej. Kiedy zaczynamy tworzyć coś niewielkiego, coś na własne potrzeby, nagle okazuje się, że każdy detal ma znaczenie. Zderzamy się z prawdziwymi problemami — od poprawnej walidacji formularzy, przez obsługę błędów, aż po estetykę interfejsu. I to właśnie te doświadczenia budują naszą praktyczną wiedzę szybciej niż jakikolwiek kurs.\r\n\r\nW małym projekcie mamy pełną kontrolę. Możemy eksperymentować z technologiami, testować nowe pomysły, a gdy coś nie działa, po prostu wracamy krok wcześniej i próbujemy inaczej. Nie ma presji czasu, nie ma zespołu czekającego na nasz commit — jest tylko czysta nauka i satysfakcja z tworzenia czegoś własnego.\r\n\r\nWarto też zauważyć, że małe projekty często przeradzają się w większe. Blog pisany „na szybko” może z czasem stać się poważnym systemem CMS. Prosty skrypt automatyzujący jeden proces może urosnąć do wewnętrznego narzędzia firmowego. A to daje ogromną motywację, bo widzimy realny postęp, zbudowany krok po kroku.\r\n\r\nNa koniec najważniejsze: małe projekty pokazują, że programowanie to proces, nie wyścig. Chodzi o to, by codziennie nauczyć się czegoś nowego, a efekt będzie naturalną konsekwencją. Dlatego warto zaczynać od małych rzeczy — bo z nich rodzą się duże umiejętności.', '2025-11-19 10:54:26'),
(6, 'Jak zacząć naukę Pythona?', 'Python to język programowania, który wyróżnia się prostą składnią i ogromną społecznością. Najlepiej zacząć od podstaw: zmiennych, typów danych, pętli i funkcji. Praktyka jest kluczem — najlepiej pisać małe programy, takie jak kalkulatory czy gry w zgadywanie liczb. Ważne jest również korzystanie z dokumentacji oraz tutoriali online. Po opanowaniu podstaw warto spróbować projektów, które pozwolą wykorzystać bibliotekę standardową i popularne pakiety, np. NumPy do obliczeń matematycznych czy Matplotlib do wizualizacji danych. Regularność, małe cele i dokumentowanie postępów pomagają utrzymać motywację i skutecznie uczyć się Pythona.', '2025-11-19 12:33:52'),
(7, 'Najlepsze praktyki w CSS', 'CSS to język stylizacji, który pozwala tworzyć atrakcyjne interfejsy użytkownika. Najważniejsze jest organizowanie kodu w sposób czytelny, np. stosowanie metodologii BEM lub SMACSS. Ważne jest unikanie nadmiarowych selektorów, wykorzystywanie zmiennych CSS i tworzenie responsywnych layoutów za pomocą flexboxa lub gridu. Równie istotne jest testowanie projektu na różnych urządzeniach i przeglądarkach. Warto też korzystać z preprocesorów, takich jak SASS lub LESS, które ułatwiają zarządzanie stylem w większych projektach i skracają czas tworzenia interfejsów.', '2025-11-19 12:33:52'),
(8, 'Git i kontrola wersji', 'Git to system kontroli wersji, który umożliwia śledzenie zmian w kodzie i współpracę w zespole. Podstawowe operacje to init, add, commit oraz push i pull. Ważne jest tworzenie gałęzi (branch) dla nowych funkcji i ich późniejsze scalanie (merge) z główną gałęzią. Regularne commitowanie pozwala zachować historię zmian, a opis commitów ułatwia orientację w projekcie. Dodatkowo, platformy takie jak GitHub lub GitLab pozwalają na przeglądanie kodu, zgłaszanie problemów i współpracę z innymi programistami. Git jest niezbędnym narzędziem w profesjonalnym programowaniu.', '2025-11-19 12:33:52'),
(9, 'Tworzenie responsywnych stron WWW', 'Responsywność strony oznacza, że jej wygląd i funkcjonalność dostosowują się do różnych rozdzielczości ekranów. Kluczowe narzędzia to media queries, flexbox i grid. Projektowanie mobile-first pomaga skupić się na najważniejszych funkcjach i poprawia wydajność. Testowanie na różnych urządzeniach jest konieczne, aby upewnić się, że strona wygląda dobrze zarówno na smartfonach, tabletach, jak i komputerach stacjonarnych. Dodatkowo warto pamiętać o optymalizacji obrazów i minimalizowaniu zbędnego kodu, co wpływa na szybkość ładowania i wygodę użytkownika.', '2025-11-19 12:33:52'),
(10, 'Dlaczego warto uczyć się algorytmów?', 'Algorytmy to podstawy programowania, które pozwalają rozwiązywać problemy w efektywny sposób. Nauka algorytmów rozwija logiczne myślenie i umiejętność planowania kodu. Warto zacząć od podstawowych struktur danych, takich jak tablice, listy, stosy czy kolejki, a następnie przejść do bardziej zaawansowanych algorytmów sortowania, wyszukiwania i grafów. Rozwiązywanie zadań na platformach typu LeetCode czy HackerRank pomaga utrwalić wiedzę i przygotowuje do rozmów rekrutacyjnych. Algorytmy nie tylko przyspieszają kodowanie, ale także pomagają pisać bardziej optymalny i skalowalny kod.', '2025-11-19 12:33:52'),
(11, 'Jak efektywnie uczyć się JavaScriptu?', 'JavaScript to język wykorzystywany głównie w przeglądarkach do tworzenia interaktywnych stron internetowych. Najlepiej rozpocząć naukę od podstaw: zmienne, funkcje, pętle, obiekty i tablice. Kolejny krok to poznanie DOM i sposobów manipulowania elementami strony. Praktyczne projekty, takie jak tworzenie formularzy, gier czy prostych aplikacji, pomagają utrwalić wiedzę. Warto również nauczyć się obsługi błędów, debugowania i korzystania z konsoli przeglądarki. Regularna praktyka i dokumentowanie postępów są kluczem do opanowania JavaScriptu.', '2025-11-19 12:33:52'),
(12, 'Podstawy baz danych SQL', 'SQL to język używany do komunikacji z relacyjnymi bazami danych. Podstawowe operacje obejmują SELECT, INSERT, UPDATE i DELETE. Ważne jest zrozumienie relacji między tabelami, kluczy głównych i obcych oraz normalizacji danych. Projektowanie bazy danych wymaga planowania struktury tabel i ich powiązań. Pisanie zapytań z JOIN pozwala łączyć dane z wielu tabel w spójne zestawienia. Regularne ćwiczenia w tworzeniu zapytań i analizie danych pomagają w nauce SQL i przygotowują do pracy z prawdziwymi projektami.', '2025-11-19 12:33:53'),
(13, 'Testowanie aplikacji w Pythonie', 'Testowanie kodu to kluczowy element profesjonalnego programowania. W Pythonie popularnym narzędziem jest moduł unittest oraz biblioteka pytest. Testy jednostkowe pozwalają sprawdzić poprawność pojedynczych funkcji, a testy integracyjne sprawdzają współpracę różnych modułów. Pisząc testy przed lub równolegle z kodem, można szybciej wykryć błędy i zapobiec regresjom. Dobrą praktyką jest automatyzacja testów oraz dokumentowanie przypadków testowych. Testowanie zwiększa pewność, że kod działa zgodnie z założeniami i jest niezawodny w dłuższej perspektywie.', '2025-11-19 12:33:53'),
(14, 'Najczęstsze błędy początkujących programistów', 'Początkujący programiści często popełniają błędy związane z nieczytelnym kodem, brak dokumentacji, nadmiernym kopiowaniem kodu oraz ignorowaniem testów. Ważne jest, aby pisać kod w sposób przejrzysty, komentować funkcje i zmienne oraz korzystać z systemów kontroli wersji. Regularne przeglądy kodu i nauka od bardziej doświadczonych programistów pomagają unikać powtarzania tych błędów. Warto także praktykować rozwiązywanie zadań i tworzenie małych projektów, które rozwijają umiejętności i budują pewność siebie w programowaniu.', '2025-11-19 12:33:53'),
(15, 'Dlaczego warto uczyć się programowania od małych projektów?', 'Małe projekty pozwalają skupić się na jednym zadaniu i dokładnie je zrozumieć. Uczą planowania, debugowania i testowania funkcji w praktyce. Realizacja niewielkiego projektu daje poczucie sukcesu i motywuje do dalszej nauki. Można eksperymentować z różnymi technologiami i metodami, a błędy w małym projekcie są łatwiejsze do poprawienia. Stopniowo małe projekty mogą przerodzić się w większe aplikacje, a zdobyta wiedza i doświadczenie stają się fundamentem dla bardziej zaawansowanych projektów i pracy w zespołach programistycznych.', '2025-11-19 12:33:53');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indeksy dla tabeli `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
