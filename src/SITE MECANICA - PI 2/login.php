<?php
session_start();

if (isset($_SESSION['usuario_id']) && $_SESSION['nivel_acesso'] === 'admin') {
    header("Location: ./admin_produtos.php");
    exit;
}

$erro = isset($_GET['erro']) ? $_GET['erro'] : null;
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Restrito - Oficina NEXT</title>
    <link rel="stylesheet" href="./assets/global.css" />
    <link rel="stylesheet" href="./assets/login.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" />
</head>
<body class="login-page-body">

    <div class="login-card">
        <form action="./modules/auth/login_action.php" method="POST">
            <div class="logo-next">
                EQUIPE <span>NEXT</span>
                <span class="subtitle">Painel Administrativo</span>
            </div>

            <?php if ($erro === '1'): ?>
                <p class="login-error">Usuário ou senha inválidos.</p>
            <?php elseif ($erro === 'acesso_negado'): ?>
                <p class="login-error">Acesso restrito. Apenas administradores.</p>
            <?php endif; ?>

            <input type="email" name="email" placeholder="E-mail Corporativo" required class="login-input" />
            <input type="password" name="senha" placeholder="Senha" required class="login-input" />

            <button type="submit" class="btn-submit">Entrar no Sistema</button>
        </form> 
    </div>

</body>
</html>