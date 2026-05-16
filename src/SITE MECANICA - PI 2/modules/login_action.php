<?php
session_start();
require_once '../config/conexao.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha = $_POST['senha'];

    // SQL Injection Protected via Prepared Statements
    $stmt = $pdo->prepare("SELECT id, nome, senha, nivel_acesso FROM usuarios WHERE email = :email");
    $stmt->execute(['email' => $email]);
    $usuario = $stmt->fetch();

    // No cadastro real você usará password_hash. Para testar o mock em texto puro:
    if ($usuario && $senha === $usuario['senha']) {
        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['usuario_nome'] = $usuario['nome'];
        $_SESSION['nivel_acesso'] = $usuario['nivel_acesso'];

        // Redireciona dependendo do nível de acesso mapeado no ENUM
        // Se o login der certo e for administrador, vai para o painel:
        if ($usuario['nivel_acesso'] === 'admin') {
            header("Location: ../../admin_produtos.php");
            exit;
        } else {
            header("Location: ../../index.php");
            exit;
        }

        // CASO O LOGIN FALHE (E-mail ou senha errados):
        // Volta duas pastas e entra direto no login.php mandando o erro para ativar o aviso vermelho
        header("Location: ../../login.php?erro=1");
        exit;
    }
}