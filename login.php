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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800&display=swap" />
</head>
<body>

    <div class="login-wrapper" id="container">

        <div class="form-container sign-in-container">
            <form action="./modules/auth/login_action.php" method="POST">
                <h1>login</h1>

                <?php if ($erro === '1'): ?>
                    <p class="erro-msg">Usuário ou senha inválidos.</p>
                <?php elseif ($erro === 'acesso_negado'): ?>
                    <p class="erro-msg">Acesso restrito. Apenas administradores.</p>
                <?php endif; ?>

                <input type="email" name="email" placeholder="E-mail Corporativo" required />
                <input type="password" name="senha" placeholder="Senha" required />

                <div class="links-actions">
                    <button type="submit" class="btn-submit">Entrar no Sistema</button>
                </div>
            </form>
        </div>

        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <div class="logo-next">EQUIPE <span>NEXT</span></div>
                    <p class="overlay-subtitle">Painel Administrativo</p>
                </div>
            </div>
        </div>

    </div>

</body>
</html>
