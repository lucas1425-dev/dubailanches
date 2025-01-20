<?php
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

// Prepara e vincula
$stmt = $conn->prepare("INSERT INTO pedidos (nome_cliente, rua, bairro, numero, forma_pagamento, tipo_entrega, lanches, adicionais, telefone) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssssss", $nome_cliente, $rua, $bairro, $numero, $forma_pagamento, $tipo_entrega, $lanches, $adicionais, $telefone); // Adiciona o telefone aqui

// Obtém os dados do formulário
$nome_cliente = $_POST['nome_cliente'];
$rua = $_POST['rua'];
$bairro = $_POST['bairro'];
$numero = $_POST['numero'];
$forma_pagamento = $_POST['forma_pagamento'];
$tipo_entrega = $_POST['forma_entrega']; // Corrigido para 'tipo_entrega'
$lanches = $_POST['lanches'];
$adicionais = $_POST['adicionais'];
$telefone = $_POST['telefone']; // Captura o telefone do formulário

// Executa a inserção
if ($stmt->execute()) {
    echo "Novo pedido registrado com sucesso!";
    // Após finalizar o pedido
    $idPedido = $conn->insert_id; // Supondo que você tenha inserido o pedido e obtido o ID
    header("Location: acompanhar_pedido.php?id=$idPedido");
    exit();
} else {
    echo "Erro: " . $stmt->error;
}

// Fecha a conexão
$stmt->close();
$conn->close();
?>