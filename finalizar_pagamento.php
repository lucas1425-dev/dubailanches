<?php
session_start(); // Inicia a sessão

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

// Obtém os dados do formulário
$nome_cliente = $_POST['nome_cliente'];
$telefone = $_POST['telefone'];
// Outros dados do pedido...

// Insere os dados no banco de dados
$sql = "INSERT INTO pedidos (nome_cliente, telefone, ...) VALUES (?, ?, ...)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss...", $nome_cliente, $telefone); // Adicione os outros parâmetros conforme necessário

if ($stmt->execute()) {
    echo "Pedido finalizado com sucesso!";
} else {
    echo "Erro ao finalizar o pedido: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>