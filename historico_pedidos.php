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

// Move os pedidos do dia anterior para o histórico
$sql = "INSERT INTO historico_pedidos (nome_cliente, rua, bairro, numero, forma_pagamento, tipo_entrega, lanches, adicionais, data, status)
        SELECT nome_cliente, rua, bairro, numero, forma_pagamento, tipo_entrega, lanches, adicionais, data, status
        FROM pedidos
        WHERE DATE(data) = CURDATE() - INTERVAL 1 DAY";

if ($conn->query($sql) === TRUE) {
    // Após mover os pedidos, você pode limpar a tabela de pedidos se desejar
    $conn->query("DELETE FROM pedidos WHERE DATE(data) = CURDATE() - INTERVAL 1 DAY");
    echo "Pedidos do dia anterior movidos para o histórico com sucesso.";
} else {
    echo "Erro ao mover pedidos: " . $conn->error;
}

$conn->close();
?>