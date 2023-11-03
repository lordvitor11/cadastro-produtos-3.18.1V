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

        $carrinho_nav = "<li class='cart-icon'><a href='carrinho.php'><img src='assets/carrinho-de-compras.png'> <span class='item-count'>$qtd_items</span></a></li>";
        $conta_nav = "<li title='Clique para sair!'><a href='quit.php'>Logado como <strong>{$_SESSION['username']}</strong>!</a></li>";

        $query = "SELECT * FROM produto";
        $result = $conn->query($query);

        $resultados = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $resultados[] = $row;
            }
        } 
    }

    $sessao_nav = "<li><a href='signup.php'>Cadastro</a></li> <li><a href='login.php'>Login</a></li>";
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
                    echo $carrinho_nav;
                    echo $conta_nav;
                } else {
                    echo $sessao_nav;
                }
            ?>
        </ul>
    </div>

    <div class="content">
        <div class="grid-container">
            <?php 
                // echo "<pre>";
                // // print_r($resultados);
                // echo $resultados[0]['nome'];
                // echo "</pre>";

                foreach ($resultados as $item) {
                    $nome = $item['nome'];
                    $img = $item['img'];
                    $preco = $item['preco'];

                    echo "
                    <div class='grid-item'>
                        <div class='img'>
                            <img src='{$img}' alt='{$nome}'>
                        </div>
                        <div class='container'>
                            <h3>$nome</h3>
                            <p>R$ {$preco},00</p>
                            <button>Adicionar ao Carrinho</button>
                        </div>
                    </div>
                    ";
                }
            ?>
            <!-- <div class="grid-item">
                <img src="caminho/para/sua/imagem1.jpg" alt="Produto 1">
                <h3>Nome do Produto 1</h3>
                <p>Descrição curta do Produto 1</p>
                <button>Adicionar ao Carrinho</button>
            </div> -->
        </div>
    </div>
</body>
</html> 