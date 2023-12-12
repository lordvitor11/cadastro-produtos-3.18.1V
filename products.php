<?php session_start();
    if (!isset($_SESSION['logged_in'])) {
        $_SESSION['logged_in'] = false;
        $_SESSION['username'] = 'none';
        $_SESSION['id'] = 'none';
    } else {
        include_once 'connect.php';

        if (isset($_GET['popup'])) {
            $status = $_GET['popup'];
            echo "<script src='script.js'></script>";
            echo "<script>popup($status);</script>";
        }

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

    <!-- <div class="container"> -->
        <div class="grid-container">
            <?php 
                foreach ($resultados as $item) {
                    $id = $item['id'];
                    $nome = $item['nome'];
                    $img = $item['img'];
                    $preco = $item['preco'];
                    $preco = number_format($preco, 2, ',', '.');

                    echo "
                    <div class='grid-item'>
                        <div class='img'>
                            <img src='{$img}' alt='{$nome}'>
                        </div>
                        <div class='container'>
                            <h3>$nome</h3>
                            <p>R$ {$preco}</p>
                            <button id='$id'>Adicionar ao Carrinho</button>
                        </div>
                    </div>
                    ";
                }
            ?>
        </div>
    </div>

    <script>
        let buttons = document.querySelectorAll(".container button");

        function send(id) {
            let xmlhttp = new XMLHttpRequest();
            xmlhttp.open("POST", "<?php echo $_SERVER['PHP_SELF']; ?>", true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send("funcao=add_product&valor=" + id);
        }

        for (let i = 0; i < buttons.length; i++) {
            buttons[i].addEventListener('click', function(event) {
                let id = event.target.id;
                window.location.href = "add_product.php?id=" + id;
            });
        }
    </script>
    <script src="script.js"></script>
</body>
</html> 