<?php
session_start();
require_once '../config/conexao.php'; // Volta uma pasta (src/) e entra em config/

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha = $_POST['senha'];

    // Busca o usuário no banco
    $stmt = $pdo->prepare("SELECT id, nome, senha, nivel_acesso FROM usuarios WHERE email = :email");
    $stmt->execute(['email' => $email]);
    $usuario = $stmt->fetch();

    // 1. VERIFICA SE O USUÁRIO EXISTE E SE A SENHA BATE
    if ($usuario && (password_verify($senha, $usuario['senha']) || $senha === $usuario['senha'])) {
        
        // 2. VERIFICA SE É ADMINISTRADOR
        if ($usuario['nivel_acesso'] === 'admin') {
            // Salva os dados na sessão
            $_SESSION['usuario_id']    = $usuario['id'];
            $_SESSION['usuario_nome']  = $usuario['nome'];
            $_SESSION['nivel_acesso']  = $usuario['nivel_acesso'];

            // CORREÇÃO: Volta apenas UMA pasta para achar o admin_produtos.php na raiz da src
            header("Location: ../admin_produtos.php");
            exit;
        } else {
            // CORREÇÃO: Volta apenas UMA pasta para achar o login.php na raiz da src
            header("Location: ../login.php?erro=acesso_negado");
            exit;
        }
        
    } else {
        // CORREÇÃO: Volta apenas UMA pasta para achar o login.php na raiz da src
        header("Location: ../login.php?erro=1");
        exit;
    }
} else {
    // CORREÇÃO: Volta apenas UMA pasta para achar o login.php na raiz da src
    header("Location: ../login.php");
    exit;
}