<?php
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

// Verifica se o ID do pedido foi passado
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    
    // Obtém o status atual do pedido
    $sql = "SELECT status FROM pedidos WHERE id = $id";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo $row['status']; // Retorna o status atual
    } else {
        echo "Pedido não encontrado.";
    }
} else {
    echo "ID do pedido não fornecido.";
}

$conn->close();
?>