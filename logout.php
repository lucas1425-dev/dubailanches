<?php
session_start();
$_SESSION = array(); // Limpa a sessão
session_destroy(); // Destroi a sessão
header("Location: login.php"); // Redireciona para a página de login
exit;
?>