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
  <title>Cadastre-se</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="navbar">
        
        <ul>
            <li><a href="index.php">Inicio</a></li>
            <li><a href="products.php">Produtos</a></li>
        </ul>
        
        <ul>
            <li><a href="login.php">Login</a></li>
            <li><a href="signup.php">Cadastro</a></li>
        </ul>
    </div>

    <div class="container" id="cadastro">
        <h2>Cadastro</h2>
        <form action="" method="post">
            <input type="text" placeholder="Nome" name="user" autocomplete="off" required>
            <input type="email" placeholder="E-mail" name="email" autocomplete="off" required>
            <input type="password" placeholder="Senha" name="pass" autocomplete="off" required>
            <button type="submit" name="sendbtn">Cadastrar</button>
        </form>
    </div>
    <?php
        if (isset($_POST["sendbtn"])) {
            include_once "connect.php";

            $user = $_POST['user'];
            $email = $_POST['email'];
            $pass = $_POST['pass'];
            $cpf = '000';

            $sql = "SELECT cpf FROM usuario WHERE cpf = '$cpf'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "O CPF $cpf já existe na tabela.";
            } else {
                $sql = "SELECT email FROM usuario WHERE email = '$email'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    echo "O email $email já existe na tabela.";
                } else {
                    $sql = "INSERT INTO usuario(cpf, email, nome, senha) VALUES ('$cpf', '$email', '$user', MD5('$pass'))";

                    if ($conn -> query($sql) === TRUE) {
                        $_SESSION['username'] = $user;
                        $_SESSION['logged_in'] = true;
                        $conn -> close();
                        header("Location: index.php");
                    } else {
                        die($conn->error);
                    }
                }
            }
        }
    ?>
</body>
</html>
