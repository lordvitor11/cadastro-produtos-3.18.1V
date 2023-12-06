<?php session_start(); include_once 'connect.php';
    $id_usuario = $_SESSION['id'];
    $id_produto = $_GET['id'];

    // echo $id_usuario;

    // echo "$id_produto, $id_usuario";

    if ($id_usuario != "none") {
        $sql = "INSERT INTO carrinho_compras(id_produto, id_usuario) VALUES ('$id_produto', '$id_usuario')";
        if ($conn -> query($sql) === TRUE) {
            header("Location: products.php?popup=6");
        } else {
            echo "Erro";
        }
    } else {
        header("Location: products.php?popup=7");
    }
?>