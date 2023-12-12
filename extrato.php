<?php session_start(); include_once "connect.php"; 

    $id = $_SESSION['id'];
    $sql = "SELECT nome, email FROM cliente WHERE id = '$id'";
    $result = $conn->query($sql);

    $nome = "";
    $email = "";

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $nome = $row['nome'];
            $email = $row['email'];
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            flex-direction: column;
        }

        .extrato-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .user-info {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #3498db;
            color: #fff;
        }

        td {
            background-color: #f9f9f9;
            text-align: center;
        }
    </style>
    <title>Extrato de Compra</title>
</head>
<body>

<div class="extrato-container">
    <h1>Extrato de Compra</h1>

    <div class="user-info">
        <p><strong>Nome do Cliente:</strong> <?php echo $nome; ?> </p>
        <p><strong>Email:</strong> <?php echo $email ?> </p>
    </div>
    
    <table>
        <thead>
            <tr>
                <th>Produto</th>
                <th>Quantidade</th>
                <th>V. Unidade</th>
                <th>Data da compra</th>
            </tr>
        </thead>
        <tbody>
                <?php 
                    $sql = "SELECT produto.id AS id_produto, produto.nome AS nome_produto, COUNT(carrinho_compras.id_produto) AS quantidade, produto.preco AS preco
                    FROM carrinho_compras 
                    INNER JOIN produto ON carrinho_compras.id_produto = produto.id
                    WHERE carrinho_compras.id_usuario = '$id'
                    GROUP BY carrinho_compras.id_produto
                    ORDER BY carrinho_compras.id_produto";

                    $result = $conn->query($sql);
                    $total = 0;

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $itemName = $row['nome_produto'];
                            $qtd = $row['quantidade'];
                            $preco = $row['preco'];
                            $data = date("d-m-Y");
                            $total += $qtd * $preco;

                            $preco = number_format($preco, 2, ',', '.');

                            echo "<tr>";
                            echo "<td>{$itemName}</td>";
                            echo "<td>{$qtd}</td>";
                            echo "<td>{$preco}</td>";
                            echo "<td>{$data}</td>";
                            echo "</tr>";

                        }
                        $total = number_format($total, 2, ',', '.');
                    }
                ?>
            </tr>
        </tbody>
    </table>

    <p>Total: <?php echo $total?> </p>
</div>

<button onclick="window.location.href='index.php';">Voltar</button>

</body>
</html>
