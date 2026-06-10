<?php
session_start();
require_once '../../config/conexao.php';

if (!isset($_SESSION['usuario_id']) || $_SESSION['nivel_acesso'] !== 'admin') {
    header("Location: ../../login.php");
    exit;
}

if (isset($_GET['id'])) {
    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    
    if ($id) {
        try {
            $stmt = $pdo->prepare("DELETE FROM contatos WHERE id = :id");
            $stmt->execute([':id' => $id]);
        } catch (PDOException $e) {
            // Silencia erro para manter o fluxo
        }
    }
}

header("Location: ../../admin_formularios.php?sucesso=excluido");
exit;