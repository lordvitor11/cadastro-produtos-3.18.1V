<?php session_start();
    if (!isset($_SESSION['logged_in'])) {
        $_SESSION['logged_in'] = false;
        $_SESSION['username'] = 'none';
        $_SESSION['id'] = 'none';
    } else {
        include_once 'connect.php';

        $id = $conn->real_escape_string($_SESSION['id']);
        $sql = "SELECT COUNT(*) AS total_registros 
        FROM carrinho_compras 
        WHERE id_usuario = '$id'";

        $result = $conn->query($sql);
        $qtd_items = 0;

        if ($result) {
            $row = $result->fetch_assoc();
            $qtd_items = $row['total_registros'];
        }

        $carrinho_nav = "<li class='cart-icon'><a href='carrinho.php'>&#128722; <span class='item-count'>$qtd_items</span></a></li>";
        $conta_nav = "<li title='Clique para sair!'><a href='quit.php'>Logado como <strong>{$_SESSION['username']}</strong>!</a></li>";
    }

    $sessao_nav = "<li><a href='signup.php'>Cadastro</a></li> <li><a href='login.php'>Login</a></li>";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <style>
        .main {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .welcome-container {
            text-align: center;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 80%;
        }

        h1 {
            color: #3498db;
        }

        p {
            font-size: 18px;
            line-height: 1.6;
        }
    </style>
    <script src="script.js"></script>

    <div class="navbar">
        <div class="menu-icon" onclick="toggleMenu()">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
        <ul class="nav-list">
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="products.php">Produtos</a></li>
            </ul>
            <ul>
                <?php 
                    if ($_SESSION['logged_in'] === true) {
                        echo $carrinho_nav;
                        echo $conta_nav;
                    } else {
                        echo $sessao_nav;
                    }
                ?>
            </ul>
        </ul>
    </div>

    <div class="main">
        <div class="welcome-container">
            <h1>Bem-vindo(a) à nossa Loja Online</h1>
            <p>Descubra uma ampla variedade de produtos de alta qualidade. Temos tudo o que você precisa para tornar a sua experiência de compra incrível.</p>
            <p>Explore nossas categorias e encontre as melhores ofertas. Esperamos que você aproveite a sua visita!</p>
        </div>
    </div>
</body>
</html> 