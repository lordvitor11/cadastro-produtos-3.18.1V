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
  <title>Entre</title>
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

    <div class="container" id="login">
        <h2>Login</h2>
        <form action="" method="post">
            <input type="text" placeholder="E-mail" autocomplete="off" name="email" required>
            <input type="password" placeholder="Senha" autocomplete="off" name="password" required>
            <button type="submit" name="sendbtn" id="login">Entrar</button>
        </form>
    </div>
    <?php 
        if (isset($_POST["sendbtn"])) {
            include_once "connect.php";

            $tempemail = $_POST['email'];
            $temppass = $_POST['password'];
            // $status = 1;
            
            $sql = "SELECT * FROM cliente WHERE email = '$tempemail'";

            $result = $conn -> query($sql);

            if ($result -> num_rows > 0) {
                while ($row = $result -> fetch_assoc()) {
                    $user = $row['nome'];
                    $email = $row['email'];
                    $pass = $row['senha'];
                }
                
                if ($tempemail == $email && md5($temppass) == $pass) {
                    $_SESSION['username'] = $user;
                    $_SESSION['logged_in'] = true;
                    $conn -> close();

                    $status = 0;
                    // header("Location: index.php");
                } else {
                    $status = 1;
                    // echo "Usuário não encontrado!";
                }

            } else {
                $status = 2;
            }

            echo "<script>popup($status);</script>";
        }  
    ?>
</body>
</html>
