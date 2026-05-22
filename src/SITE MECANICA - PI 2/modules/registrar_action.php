<?php
/* ============================================================
   AÇÃO DE REGISTRO INTERNO DE USUÁRIOS
   ============================================================ */
session_start();
require_once '../config/conexao.php';

// SEGURANÇA MÁXIMA: Só permite que o script execute se quem chamou for um admin logado
if (!isset($_SESSION['usuario_id']) || $_SESSION['nivel_acesso'] !== 'admin') {
    header("Location: ../login.php?erro=acesso_negado");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $nome         = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $sobrenome    = filter_input(INPUT_POST, 'sobrenome', FILTER_SANITIZE_SPECIAL_CHARS);
    $email        = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha        = $_POST['senha'];
    $nivel_acesso = filter_input(INPUT_POST, 'nivel_acesso', FILTER_SANITIZE_SPECIAL_CHARS);

    // Valida se o nível de acesso enviado faz parte das opções do ENUM
    if (!in_array($nivel_acesso, ['admin', 'cliente'])) {
        $nivel_acesso = 'cliente';
    }

    if ($nome && $sobrenome && $email && $senha) {
        try {
            // Verifica duplicidade de e-mail
            $stmt_check = $pdo->prepare("SELECT id FROM usuarios WHERE email = :email");
            $stmt_check->execute([':email' => $email]);
            
            if ($stmt_check->rowCount() > 0) {
                // Se o e-mail já existe, volta para a tela de usuários com erro
                header("Location: ../admin_usuarios.php?erro=email_existente");
                exit;
            }

            $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

            // Grava o usuário salvando também o nível de acesso escolhido no <select>
            $sql = "INSERT INTO usuarios (nome, sobrenome, email, senha, nivel_acesso) VALUES (:nome, :sobrenome, :email, :senha, :nivel_acesso)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':nome'         => $nome,
                ':sobrenome'    => $sobrenome,
                ':email'        => $email,
                ':senha'        => $senha_hash,
                ':nivel_acesso' => $nivel_acesso
            ]);

            // Sucesso: Retorna para o painel de equipe
            header("Location: ../admin_usuarios.php?sucesso=1");
            exit;

        } catch (PDOException $e) {
            header("Location: ../admin_usuarios.php?erro=db");
            exit;
        }
    } else {
        header("Location: ../admin_usuarios.php?erro=campos_vazios");
        exit;
    }
} else {
    header("Location: ../admin_usuarios.php");
    exit;
}