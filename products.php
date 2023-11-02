<?php session_start();
    if (!isset($_SESSION['logged_in'])) {
        $_SESSION['logged_in'] = false;
        $_SESSION['username'] = 'none';
    } else {
        include_once 'connect.php';

        $username = $conn->real_escape_string($_SESSION['username']);
        $sql = "SELECT COUNT(*) AS total_registros 
        FROM cliente 
        INNER JOIN carrinho_compras ON cliente.id = carrinho_compras.id_usuario 
        WHERE cliente.nome = '$username'";

        $result = $conn->query($sql);
        $qtd_items = 0;

        if ($result) {
            $row = $result->fetch_assoc();
            $qtd_items = $row['total_registros'];
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
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
                    echo "<li class='cart-icon'><a href='carrinho.php'><img src='assets/carrinho-de-compras.png'> <span class='item-count'>$qtd_items</span></a></li>";
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
</body>
</html> 