<?php
    $con = mysqli_connect("localhost", "root", "", "blog");
    if (mysqli_connect_errno()) {
        echo "Błąd połączenia do bazy: " . mysqli_connect_error();
        exit();
    }
?>