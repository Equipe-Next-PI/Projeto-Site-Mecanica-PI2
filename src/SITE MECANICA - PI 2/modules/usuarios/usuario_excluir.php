<?php
session_start();
require_once '../../config/conexao.php';

if (!isset($_SESSION['usuario_id']) || $_SESSION['nivel_acesso'] !== 'admin') {
    header("Location: ../../login.php");
    exit;
}

if (isset($_GET['id'])) {
    $id_excluir = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    
    if ($id_excluir === $_SESSION['usuario_id']) {
        header("Location: ../../admin_usuarios.php?erro=auto_exclusao");
        exit;
    }
    
    if ($id_excluir) {
        try {
            $stmt = $pdo->prepare("DELETE FROM usuarios WHERE id = :id");
            $stmt->execute([':id' => $id_excluir]);
            
            header("Location: ../../admin_usuarios.php?sucesso=excluido");
            exit;
        } catch (PDOException $e) {
            header("Location: ../../admin_usuarios.php?erro=db");
            exit;
        }
    }
}

header("Location: ../../admin_usuarios.php");
exit;