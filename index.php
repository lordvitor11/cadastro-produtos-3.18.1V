<?php session_start();
    if (!isset($_SESSION['logged_in'])) {
        $_SESSION['logged_in'] = false;
    }
    
    if (!isset($_SESSION['username'])) {
        $_SESSION['username'] = 'none';
    }
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
    <div class="navbar">
        <ul>
            <li><a href="index.php">Inicio</a></li>
            <li><a href="products.php">Produtos</a></li>
        </ul>
        
        <ul>
            <?php 
                if ($_SESSION['logged_in'] === true) {
                    echo "<li title='Clique para sair!'><a href='quit.php'>Logado como <strong>{$_SESSION['username']}</strong>!</a></li>";
                } else {
                    echo "
                    <li><a href='signup.php'>Cadastro</a></li>
                    <li><a href='login.php'>Login</a></li>
                    ";
                }
            ?>
        </ul>
    </div>

    <div class="main">
        <h1>Projeto Carrinho de Compras</h1>

        <p>Este é um site desenvolvido para filiar e aplicar os conhecimentos adquiridos nas matérias de <strong>Lingugagem de Programação II</strong> e <strong>Banco de Dados</strong>.</p>
    </div>
</body>
</html> 