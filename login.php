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

    <div class="container" id="login">
        <h2>Login</h2>
        <form action="" method="post">
            <input type="text" placeholder="Usuário" autocomplete="off" name="user" required>
            <input type="password" placeholder="Senha" autocomplete="off" name="password" required>
            <button type="submit" name="sendbtn">Entrar</button>
        </form>
    </div>
    <?php 
        if (isset($_POST["sendbtn"])) {
            $tempname = $_POST['user'];
            $temppass = $_POST['password'];
            
            if ($tempname == "LV" && $temppass == "123") {
                header("Location: insert.php?user=LV");
            } else {
                echo "Credenciais inválidas!";
            }
        }  
    ?>
</body>
</html>
