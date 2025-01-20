<?php
session_start(); // Inicia a sessão

// Verifica se o usuário está logado
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php"); // Redireciona para a página de login
    exit;
}

// Conexão com o banco de dados
$servername = "localhost"; // ou o endereço do seu servidor
$username = "root"; // seu usuário do banco de dados
$password = ""; // sua senha do banco de dados
$dbname = "sistema_lanches"; // nome do seu banco de dados

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Move todos os pedidos para o histórico
$sqlMover = "INSERT INTO historico_pedidos (nome_cliente, rua, bairro, numero, forma_pagamento, tipo_entrega, lanches, adicionais, data, status)
             SELECT nome_cliente, rua, bairro, numero, forma_pagamento, tipo_entrega, lanches, adicionais, data, status
             FROM pedidos";

if ($conn->query($sqlMover) === TRUE) {
    // Limpa a tabela de pedidos
    $conn->query("DELETE FROM pedidos");
    header("Location: admin.php?success=Todos os pedidos foram movidos para o histórico com sucesso.");
} else {
    echo "Erro ao mover pedidos: " . $conn->error;
}

$conn->close();
?>