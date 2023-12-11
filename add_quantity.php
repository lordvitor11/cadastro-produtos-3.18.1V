<?php session_start(); include_once "connect.php";

    $tipo = $_POST['tipo'];
    $id_usuario = $conn->real_escape_string($_SESSION['id']);
    $id_produto = $_POST['id'];

    if ($tipo == "add") {
        $sql = "INSERT INTO carrinho_compras (id_produto, id_usuario) VALUES ('$id_produto', '$id_usuario')";
    } else {
        $sql = "DELETE FROM carrinho_compras WHERE id_produto = $id_produto AND id_usuario = $id_usuario LIMIT 1";
    }

    $result = $conn->query($sql);
    print_r($result);

// // Obtém a modalidade selecionada
// $modalidadeSql = "";

// // Realiza a consulta no banco de dados de acordo com a modalidade
// // Implemente a lógica de consulta real aqui

// // Supondo que você tenha uma tabela chamada 'inscricoes' para cada modalidade
// // Você precisa ajustar isso conforme sua estrutura real do banco de dados

// if ($modalidade == "maratona") { $modalidadeSql = "inscricoes_maratona"; } 
// else if ($modalidade == "trilha") { $modalidadeSql = "inscricoes_trilha"; }
// else if ($modalidade == "caminhada") { $modalidadeSql = "inscricoes_caminhada"; }

// if ($modalidadeSql == "") {
//     $sql = "SELECT * FROM inscricoes_caminhada CROSS JOIN inscricoes_maratona CROSS JOIN inscricoes_trilha";
// } else {
//     $sql = "SELECT * FROM $modalidadeSql";
// }

// $result = $conn->query($sql);
// $conn->close();

// // Converte os resultados para um array associativo
// $results = [];
// while ($row = $result->fetch_assoc()) {
//     $results[] = $row;
// }

// Retorna os resultados em formato JSON
//echo json_encode($results);
?>


