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

// Verifica se o ID do pedido foi enviado
if (isset($_POST['id'])) {
    $id = intval($_POST['id']);
    
    // Obtém o status atual do pedido
    $sql = "SELECT status FROM pedidos WHERE id = $id";
    $result = $conn->query($sql);
    
    // Verifica se a consulta foi bem-sucedida
    if ($result === false) {
        die("Erro na consulta: " . $conn->error);
    }

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $statusAtual = $row['status'];
        
        // Altera o status (exemplo: de 'Preparando' para 'Pronto' ou 'Saiu para Entrega')
        if ($statusAtual === 'Preparando') {
            $novoStatus = 'Pronto';
        } elseif ($statusAtual === 'Pronto') {
            $novoStatus = 'Saiu para Entrega';
        } else {
            $novoStatus = 'Preparando'; // Retorna ao estado inicial se não estiver em 'Preparando' ou 'Pronto'
        }
        
        // Atualiza o status no banco de dados
        $sqlUpdate = "UPDATE pedidos SET status = '$novoStatus' WHERE id = $id";
        if ($conn->query($sqlUpdate) === TRUE) {
            echo $novoStatus; // Retorna o novo status
        } else {
            echo "Erro ao atualizar o status: " . $conn->error;
        }
    } else {
        echo "Pedido não encontrado.";
    }
} else {
    echo "ID do pedido não fornecido.";
}

$conn->close();
?>