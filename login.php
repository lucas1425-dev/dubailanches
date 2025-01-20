<?php
session_start(); // Inicia a sessão

// Verifica se o usuário já está logado
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header("Location: admin.php"); // Redireciona para a página de administração
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Defina as credenciais
    $usuario = "dubaicba";
    $senha = "dubaicba";

    // Obtém os dados do formulário
    $usuario_input = $_POST['usuario'];
    $senha_input = $_POST['senha'];

    // Verifica as credenciais
    if ($usuario_input === $usuario && $senha_input === $senha) {
        $_SESSION['loggedin'] = true; // Define a sessão como logada
        header("Location: admin.php"); // Redireciona para a página de administração
        exit();
    } else {
        $erro = "Usuário ou senha inválidos.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Dubai Lanches</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .login-container {
            max-width: 400px;
            margin: auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 100px;
        }
        h2 {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2 class="text-center">Login</h2>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="usuario" class="form-label">Usuário</label>
                <input type="text" class="form-control" name="usuario" required>
            </div>
            <div class="mb-3">
                <label for="senha" class="form-label">Senha</label>
                <input type="password" class="form-control" name="senha" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Entrar</button>
        </form>
        <?php if (isset($erro)): ?>
            <div class="alert alert-danger mt-3" role="alert">
                <?php echo $erro; ?>
            </div>
        <?php endif; ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>