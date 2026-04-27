<?php
session_start(); // Inicia a sessão para controle de login

// Verifica se existe alguma mensagem de erro ou sucesso na URL
$erro = isset($_GET['erro']) ? $_GET['erro'] : null;
$sucesso = isset($_GET['sucesso']) ? $_GET['sucesso'] : null;
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Oficina NEXT</title>
    <link rel="stylesheet" href="./assets/global.css" />
    <link rel="stylesheet" href="./assets/login.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" />
</head>

<body>

    <div class="login-wrapper" id="container">

        <div class="form-container sign-up-container">
            <form action="registrar_action.php" method="POST">
                <h1>Registro</h1>
                <input type="text" name="nome" placeholder="Nome" required />
                <input type="text" name="sobrenome" placeholder="Sobrenome" required />
                <input type="email" name="email" placeholder="E-mail" required />
                <input type="password" name="senha" placeholder="Senha" required />

                <div class="links-actions">
                    <a href="#" class="btn-toggle" id="signIn">Já tenho conta (Entrar)</a>
                    <button type="submit" class="btn-submit">Registrar</button>
                </div>
            </form>
        </div>

        <div class="form-container sign-in-container">
            <form action="login_action.php" method="POST">
                <h1>login</h1>

                <?php if ($erro): ?>
                    <p style="color: #ff4d4d; font-size: 12px; margin-bottom: 10px;">Usuário ou senha inválidos.</p>
                <?php endif; ?>

                <input type="email" name="email" placeholder="E-mail" required />
                <input type="password" name="senha" placeholder="Senha" required />

                <div class="links-actions">
                    <button type="submit" class="btn-submit">Entrar</button>
                    <a href="#" class="btn-toggle" id="signUp">Criar conta (Registro)</a>
                </div>
            </form>
        </div>

        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <div class="logo-next">EQUIPE <span>NEXT</span><br>Mecânica</div>
                </div>
                <div class="overlay-panel overlay-right">
                    <div class="logo-next">EQUIPE <span>NEXT</span><br>Mecânica</div>
                </div>
            </div>
        </div>

    </div>

    <script src="./assets/script.js"></script>
</body>

</html>