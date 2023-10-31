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
        <form onsubmit="popup();" action="" method="post">
            <input type="text" placeholder="E-mail" autocomplete="off" name="email" required>
            <input type="password" placeholder="Senha" autocomplete="off" name="password" required>
            <button type="submit" name="sendbtn" id="login">Entrar</button>
        </form>
    </div>
    <?php 
        if (isset($_POST[""])) {
            include_once "connect.php";

            $tempemail = $_POST['email'];
            $temppass = $_POST['password'];
            
            $sql = "SELECT * FROM usuario WHERE email = '$tempemail'";

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
            }
        }  
    ?>

    <script>
        function popup() {
            let tempemail = <?php echo json_encode($tempemail); ?>;
            let temppass = <?php echo json_encode($temppass); ?>;
            let status = <?php echo json_encode($status); ?>;

            let divpopup = document.createElement('div');
            divpopup.classList.add('popup');

            let divpopupcontent = document.createElement('div');
            divpopupcontent.classList.add('popup-content');

            let span = document.createElement('span');
            span.classList.add('close');
            span.setAttribute('id', 'closePopup');
            span.innerHTML = "&times;";
            
            let h2 = document.createElement('h2');
            let p = document.createElement('p');

            if (status == 0) {
                h2.innerHTML = "Sucesso";
                p.innerHTML = "Logado(a) com sucesso!";
            } else {
                h2.innerHTML = "Erro";
                p.innerHTML = "Usuário não encontrado!";
            }

            divpopup.appendChild(divpopupcontent);
            divpopupcontent.append(span);
            divpopupcontent.append(h2);
            divpopupcontent.append(p);
            
            let body = document.getElementsByClassName('body');
            body.appendChild(divpopup);

            // document.getElementById('popup').style.display = 'block';

            // document.getElementById('closePopup').addEventListener('click', function() {
            //     document.getElementById('popup').style.display = 'none';
            // });
        }

        

       
    </script>
     <!-- <div class="popup" id="popup">
        <div class="popup-content">
            <span class="close" id="closePopup">&times;</span>
            <h2><?php echo $popupTitle; ?></h2>
            <p><?php echo $popupContent; ?></p>
        </div>
    </div> -->
</body>
</html>
