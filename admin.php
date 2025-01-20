<?php

session_start(); // Inicia a sessão

// Verifica se o usuário está logado
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php"); // Redireciona para a página de login
    exit;
}
// O restante do código permanece o mesmo...



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

// Obtém todos os pedidos
$sqlPedidos = "SELECT * FROM pedidos";
$resultPedidos = $conn->query($sqlPedidos);

// Inicializa variáveis para o resumo
$totalVendas = 0;
$quantidadeHamburgueres = [
    'Hambúrguer Dubai' => 0,
    'Cheeseburger Classic' => 0,
    'Veggie Burger' => 0
];

// Processa os pedidos
if ($resultPedidos->num_rows > 0) {
    while ($row = $resultPedidos->fetch_assoc()) {
        // Aqui, você deve calcular o total de cada pedido
        $lanches = json_decode($row['lanches'], true); // Decodifica como array associativo
        $adicionais = json_decode($row['adicionais'], true); // Decodifica como array associativo
        
        // Calcule o total do pedido
        $totalPedido = 0;

        // Contabiliza a quantidade de cada hambúrguer
        foreach ($lanches as $lanche) {
            $quantidadeHamburgueres[$lanche]++;
            // Supondo que você tenha um array associativo com preços
            switch ($lanche) {
                case 'Hambúrguer Dubai':
                    $totalPedido += 19.90; // Preço do hambúrguer
                    break;
                case 'Cheeseburger Classic':
                    $totalPedido += 17.90; // Preço do cheeseburger
                    break;
                case 'Veggie Burger':
                    $totalPedido += 18.90; // Preço do veggie burger
                    break;
            }
        }
        
        // Contabiliza os adicionais
        foreach ($adicionais as $adicional) {
            $totalPedido += $adicional['preco'] * $adicional['quantidade']; // Supondo que você tenha o preço e a quantidade no JSON
        }

        $totalVendas += $totalPedido; // Soma o total do pedido ao total de vendas
    }
}

// Obtém todos os pedidos históricos
$sqlHistorico = "SELECT * FROM historico_pedidos ORDER BY data DESC";
$resultHistorico = $conn->query($sqlHistorico);

// Verifica se a consulta foi bem-sucedida
if ($resultHistorico === false) {
    die("Erro na consulta: " . $conn->error);
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Painel de Administração - Dubai Lanches</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 20px;
        }
        h2 {
            margin-bottom: 20px;
        }
        .card {
            margin-bottom: 20px;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div class="container">
        <h 2 class="text-center">Painel de Administração</h2>

        <!-- Sessão de Pedidos -->
        <div class="card">
            <div class="card-header">
                <h5>Todos os Pedidos</h5>
            </div>
            <div class="card-body">
                <?php if ($resultPedidos->num_rows > 0): ?>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome do Cliente</th>
                                <th>Rua</th>
                                <th>Bairro</th>
                                <th>Número</th>
                                <th>Forma de Pagamento</th>
                                <th>Tipo de Entrega</th>
                                <th>Lanches</th>
                                <th>Adicionais</th>
                                <th>Total</th>
                                <th>Data</th>
                                <th>Status</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Reposiciona o ponteiro do resultado para o início
                            $resultPedidos->data_seek(0);
                            while ($row = $resultPedidos->fetch_assoc()) {
                                $lanches = json_decode($row['lanches'], true);
                                $adicionais = json_decode($row['adicionais'], true);
                                $totalPedido = 0;

                                // Calcule o total do pedido
                                foreach ($lanches as $lanche) {
                                    switch ($lanche) {
                                        case 'Hambúrguer Dubai':
                                            $totalPedido += 19.90;
                                            break;
                                        case 'Cheeseburger Classic':
                                            $totalPedido += 17.90;
                                            break;
                                        case 'Veggie Burger':
                                            $totalPedido += 18.90;
                                            break;
                                    }
                                }

                                // Contabiliza os adicionais
                                foreach ($adicionais as $adicional) {
                                    $totalPedido += $adicional['preco'] * $adicional['quantidade'];
                                }
                            ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['nome_cliente']; ?></td>
                                    <td><?php echo $row['rua']; ?></td>
                                    <td><?php echo $row['bairro']; ?></td>
                                    <td><?php echo $row['numero']; ?></td>
                                    <td><?php echo $row['forma_pagamento']; ?></td>
                                    <td><?php echo $row['tipo_entrega']; ?></td>
                                    <td><?php echo implode(", ", $lanches); ?></td>
                                    <td><?php echo implode(", ", array_map(function($ad) { return $ad['nome']; }, $adicionais)); ?></td>
                                    <td>R$ <?php echo number_format($totalPedido, 2, ',', '.'); ?></td>
                                    <td><?php echo date('d/m/Y H:i', strtotime($row['data'])); ?></td>
                                    <td id="status-<?php echo $row['id']; ?>"><?php echo $row['status']; ?></td>
                                    <td>
                                        <button class="btn btn-primary" onclick="alterarStatus(<?php echo $row['id']; ?>)">Alterar Status</button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p class="text-center">Nenhum pedido encontrado.</p>
                <?php endif; ?>
            </div>
        </div>

        <!-- Botão para mover pedidos para o histórico -->
        <div class="card">
            <div class="card-header">
                <h5>Histórico de Pedidos</h5>
            </div>
            <div class="card-body">
                <form action="mover_pedidos.php" method="post">
                    <button type="submit" class="btn btn-success">Mover Pedidos do Dia para o Histórico</button>
                </form>
                <?php if ($resultHistorico->num_rows > 0): ?>
                    <table class="table table-striped mt-3">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome do Cliente</th>
                                <th>Data</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $resultHistorico->fetch_assoc()): ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo htmlspecialchars($row['nome_cliente']); ?></td>
                                    <td><?php echo date('d/m/Y H:i', strtotime($row ['data'])); ?></td>
                                    <td><?php echo htmlspecialchars($row['status']); ?></td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p>Nenhum pedido histórico encontrado.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script>
        function alterarStatus(id) {
            $.ajax({
                url: 'alterar_status.php',
                type: 'POST',
                data: { id: id },
                success: function(response) {
                    $('#status-' + id).text(response);
                },
                error: function() {
                    alert('Erro ao alterar o status do pedido.');
                }
            });
        }
    </script>
</body>

</html>