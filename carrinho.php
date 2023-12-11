<?php session_start();
    if (!isset($_SESSION['logged_in'])) {
        $_SESSION['logged_in'] = false;
        $_SESSION['username'] = 'none';
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
    }

    include_once 'connect.php';

    $username = $conn->real_escape_string($_SESSION['username']);

    $sql = "SELECT cliente.* FROM cliente INNER JOIN carrinho_compras ON cliente.id = carrinho_compras.id_usuario WHERE cliente.nome = '$username'";
    
    $result = $conn->query($sql);

    if ($result) {
        $num_rows = $result->num_rows;

        if ($num_rows >= 1) {
            $carrinho = "<div class='products'></div> <div class='overview'></div>";
        } else {
            $carrinho = "";
        }
    } else {
        echo "Erro na consulta: " . $conn->error;
    }

    $carrinho_nav = "<li class='cart-icon'><a href='carrinho.php'><img src='assets/carrinho-de-compras.png'> <span class='item-count'>$qtd_items</span></a></li>";
    $conta_nav = "<li title='Clique para sair!'><a href='quit.php'>Logado como <strong>{$_SESSION['username']}</strong>!</a></li>";
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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="script.js"></script>
    <div class="navbar">
        <ul>
            <li><a href="index.php">Inicio</a></li>
            <li><a href="products.php">Produtos</a></li>
        </ul>
        <img src="" alt="">
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

    <div class="cart-container">
        <div class="cart-items">
            <?php echo $carrinho;
                $id_user = $_SESSION['id'];

                $sql = "SELECT produto.id AS id_produto, produto.nome AS nome_produto, COUNT(carrinho_compras.id_produto) AS quantidade, produto.preco AS preco, produto.img AS itemImage
                        FROM carrinho_compras 
                        INNER JOIN produto ON carrinho_compras.id_produto = produto.id
                        WHERE carrinho_compras.id_usuario = '$id_user'
                        GROUP BY carrinho_compras.id_produto
                        ORDER BY carrinho_compras.id_produto";

                $result = $conn->query($sql);
                $total = 0;
            

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $img = $row['itemImage'];
                        $preco = "R$" . number_format($row['preco'], 2, ',', '.');
                        $id = $row['id_produto'];
                        echo "<div class='cart-item' id='{$id}'>
                                <img src='{$img}'>
                                <span>{$row['nome_produto']}</span>

                                <div class='controls'>
                                    <span class='preco'> {$preco}</span>
                
                                    <div class='counter'>
                                        <button class='{$id}' id='remove' name='add' onclick='quantity(this)'>-</button>
                                        <div class='number'><span class='qtd'>{$row['quantidade']}</span></div>
                                        <button class='{$id}' id='add' onclick='quantity(this);'>+</button>
                                    </div>
                                    <button class='trash-button'></button>
                                </div>

                             </div>";

                        $total += $row['quantidade'] * $row['preco'];
                    }

                    $total = number_format($total, 2, ',', '.');

                    echo "<div class='cart-subtotal'>
                        Subtotal: R$<?php echo $total ?> <br>
                        <button class='finish-button'>Finalizar compra</button>
                    </div>";

                } else {
                    echo "<h2>Você ainda não tem itens no carrinho </h2><br>"; 
                    echo "<a href='products.php'><button class='null-button'>Adicionar</button></a></div>";
                }


                ?>
        </div>

        

    </div>
</body>
</html> 