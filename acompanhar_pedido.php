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

// Verifica se o ID do pedido foi passado na URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    
    // Obtém os detalhes do pedido
    $sql = "SELECT * FROM pedidos WHERE id = $id";
    $result = $conn->query($sql);
    
    if ($result && $result->num_rows > 0) {
        $pedido = $result->fetch_assoc();
    } else {
        die("Pedido não encontrado.");
    }
} else {
    die("ID do pedido não fornecido.");
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acompanhar Pedido - Dubai Lanches</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h2 class="text-center">Acompanhamento do Pedido</h2>
        <div class="card">
            <div class="card-header">
                <h5>ID do Pedido: <?php echo isset($pedido) ? $pedido['id'] : 'N/A'; ?></h5>
            </div>
            <div class="card-body">
                <p><strong>Nome do Cliente:</strong> <?php echo isset($pedido) ? $pedido['nome_cliente'] : 'N/A'; ?></p>
                <p><strong>Status do Pedido:</strong> <span id="status"><?php echo isset($pedido) ? $pedido['status'] : 'N/A'; ?></span></p>
                <p><strong>Data do Pedido:</strong> <?php echo isset($pedido) ? date('d/m/Y H:i', strtotime($pedido['data'])) : 'N/A'; ?></p>
                <p><strong>Forma de Pagamento:</strong> <?php echo isset($pedido) ? $pedido['forma_pagamento'] : 'N/A'; ?></p>
                <p><strong>Tipo de Entrega:</strong> <?php echo isset($pedido) ? $pedido['tipo_entrega'] : 'N/A'; ?></p>
                <p><strong>Lanches:</strong> <?php echo isset($pedido) ? implode(", ", json_decode($pedido['lanches'], true)) : 'N/A'; ?></p>
                <p><strong>Adicionais:</strong> <?php echo isset($pedido) ? implode(", ", array_map(function($ad) { return $ad['nome']; }, json_decode($pedido['adicionais'], true))) : 'N/A'; ?></p>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Função para atualizar o status do pedido a cada 5 segundos
        setInterval(function() {
            $.ajax({
                url: 'atualizar_status.php',
                type: 'GET',
                data: { id: <?php echo $pedido['id']; ?> },
                success : function(response) {
                    $('#status').text(response);
                },
                error: function() {
                    console.error('Erro ao atualizar o status do pedido.');
                }
            });
        }, 5000); // Atualiza a cada 5 segundos
    </script>
</body>

</html>