<?php 
    include_once 'connect.php';

    $sql = "
    CREATE TABLE cliente (
        id INT PRIMARY KEY AUTO_INCREMENT,
        nome VARCHAR(70) NOT NULL,
        email VARCHAR(150) NOT NULL UNIQUE,
        cpf VARCHAR(11) NOT NULL UNIQUE,
        senha VARCHAR(60) NOT NULL
    );
    
    CREATE TABLE produto (
        id INT PRIMARY KEY AUTO_INCREMENT,
        nome VARCHAR(70) NOT NULL,
        descricao VARCHAR(45) NOT NULL,
        categoria VARCHAR(45) NOT NULL,
        quantidade INT NOT NULL,
        preco VARCHAR(45) NOT NULL
    );

    CREATE TABLE carrinho_compras (
        id INT PRIMARY KEY AUTO_INCREMENT,
        id_produto INT PRIMARY KEY AUTO_INCREMENT,
        id_usuario INT PRIMARY KEY AUTO_INCREMENT,

        FOREIGN KEY(id_produto) REFERENCES produto(id),
        FOREIGN KEY(id_usuario) REFERENCES cliente(id)
    );
    ";


?>