<?php session_start();
    if (!isset($_SESSION['logged_in'])) {
        $_SESSION['logged_in'] = false;
        $_SESSION['username'] = 'none';
        $_SESSION['id'] = 'none';
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Cadastre-se</title>
  <link rel="stylesheet" href="style.css">
  <script src="script.js"></script>
</head>
<body>
    <div class="navbar">
        
        <ul>
            <li><a href="index.php">Inicio</a></li>
            <li><a href="products.php">Produtos</a></li>
        </ul>
        
        <ul>
            <li><a href="signup.php">Cadastro</a></li>
            <li><a href="login.php">Login</a></li>
        </ul>
    </div>

    <div class="container" id="cadastro">
        <h2>Cadastro</h2>
        <form action="" method="post">
            <input type="text" placeholder="Nome" name="user" autocomplete="off" autocapitalize="on" required>
            <input type="text" placeholder="CPF" name="cpf" autocomplete="off" required>
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
            $cpf = $_POST['cpf'];

            $sql = "SELECT cpf FROM cliente WHERE cpf = '$cpf'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $status = 4;
            } else {
                $sql = "SELECT email FROM cliente WHERE email = '$email'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $status = 5;
                } else {
                    $sql = "INSERT INTO cliente(cpf, email, nome, senha) VALUES ('$cpf', '$email', '$user', MD5($pass))";

                    if ($conn -> query($sql) === TRUE) {
                        $_SESSION['username'] = $user;
                        $_SESSION['logged_in'] = true;

                        $sql = "SELECT id FROM cliente WHERE email = '$email'";
                        $result = $conn->query($sql);
                        $_SESSION['id'] =  $result;
                        
                        $conn -> close();
                        $status = 3;
                    } else {
                        die($conn->error);
                    }
                }
            }

            echo "<script>popup($status);</script>";
        }
    ?>
</body>
</html>
