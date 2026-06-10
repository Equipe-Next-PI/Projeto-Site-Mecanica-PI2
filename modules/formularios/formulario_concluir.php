<?php
session_start();
require_once '../../config/conexao.php';

if (!isset($_SESSION['usuario_id']) || $_SESSION['nivel_acesso'] !== 'admin') {
    header("Location: ../../login.php");
    exit;
}

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if ($id) {
    try {
        // Atualiza o status diretamente para concluido
        $stmt = $pdo->prepare("UPDATE contatos SET status = 'concluido' WHERE id = :id");
        $stmt->execute([':id' => $id]);
        
        header("Location: ../../admin_formularios.php?sucesso=concluido");
        exit;
    } catch (PDOException $e) {
        header("Location: ../../admin_formularios.php?erro=db");
        exit;
    }
}

header("Location: ../../admin_formularios.php");
exit;