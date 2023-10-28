<?php session_start();
    $_SESSION['username'] = ucwords(strtolower($_POST['user']));
    $_SESSION['logged_in'] = true;

    header("Location: index.php");
?>