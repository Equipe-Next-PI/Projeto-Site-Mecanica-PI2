<?php
session_start();
require_once '../../config/conexao.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha = $_POST['senha'];

    $stmt = $pdo->prepare("SELECT id, nome, senha, nivel_acesso FROM usuarios WHERE email = :email");
    $stmt->execute(['email' => $email]);
    $usuario = $stmt->fetch();

    if ($usuario && (password_verify($senha, $usuario['senha']) || $senha === $usuario['senha'])) {
        
        if ($usuario['nivel_acesso'] === 'admin') {
            $_SESSION['usuario_id']    = $usuario['id'];
            $_SESSION['usuario_nome']  = $usuario['nome'];
            $_SESSION['nivel_acesso']  = $usuario['nivel_acesso'];

            header("Location: ../../admin_produtos.php");
            exit;
        } else {
            header("Location: ../../login.php?erro=acesso_negado");
            exit;
        }
        
    } else {
        header("Location: ../../login.php?erro=1");
        exit;
    }
} else {
    header("Location: ../../login.php");
    exit;
}