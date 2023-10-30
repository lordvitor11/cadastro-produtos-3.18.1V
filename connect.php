<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "carrinho";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    } else {
        echo "Conexão bem-sucedida!";
    }
?>