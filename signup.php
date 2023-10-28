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
        <form action="insert.php" method="post">
            <input type="text" placeholder="Nome" name="user" autocomplete="off" required>
            <input type="email" placeholder="E-mail" name="email" autocomplete="off" required>
            <input type="password" placeholder="Senha" name="pass" autocomplete="off" required>
            <button type="submit">Cadastrar</button>
        </form>
    </div>
</body>
</html>
