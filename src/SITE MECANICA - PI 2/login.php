<?php
session_start();

// Se o administrador já estiver logado, manda direto para o painel
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

<body>

    <div class="login-wrapper" id="container" style="display: flex; justify-content: center; align-items: center; min-height: 100vh;">

        <div class="form-container sign-in-container" style="position: static; width: 100%; max-width: 400px; background: white; padding: 40px; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
            <form action="./modules/auth/login_action.php" method="POST" style="background: transparent; padding: 0;">
                <div class="logo-next" style="text-align: center; margin-bottom: 20px; color: #1f3a5f; font-weight: 700; font-size: 24px;">
                    EQUIPE <span style="color: #ff6b00;">NEXT</span><br><span style="font-size: 16px; font-weight: 400; color: #666;">Painel Administrativo</span>
                </div>

                <?php if ($erro === '1'): ?>
                    <p style="color: #ff4d4d; font-size: 12px; margin-bottom: 15px; text-align: center; font-weight: 600;">Usuário ou senha inválidos.</p>
                <?php elseif ($erro === 'acesso_negado'): ?>
                    <p style="color: #ff4d4d; font-size: 12px; margin-bottom: 15px; text-align: center; font-weight: 600;">Acesso restrito. Apenas administradores.</p>
                <?php endif; ?>

                <input type="email" name="email" placeholder="E-mail Corporativo" required style="width: 100%; padding: 12px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px;" />
                <input type="password" name="senha" placeholder="Senha" required style="width: 100%; padding: 12px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 4px;" />

                <button type="submit" class="btn-submit" style="width: 100%; padding: 12px; background: #ff6b00; color: white; border: none; border-radius: 4px; font-weight: 600; cursor: pointer;">Entrar no Sistema</button>
            </form>
        </div>

    </div>

</body>
</html>