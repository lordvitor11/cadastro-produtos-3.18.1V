<?php session_start();
    $_SESSION['username'] = isset($_POST['user']) ? $_POST['user'] : $_GET['user'];
    $_SESSION['logged_in'] = true;

    header("Location: index.php");
?>