<?php
/* ============================================================
   AÇÃO DE EXCLUSÃO DE PRODUTOS
   ============================================================ */
session_start();
require_once '../config/conexao.php';

// Verifica se o ID foi passado na URL
if (isset($_GET['id'])) {
    
    // Sanitiza o ID para garantir que é um número inteiro válido
    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    
    if ($id) {
        try {
            // Executa a exclusão no banco de dados usando PDO Prepared Statements
            $stmt = $pdo->prepare("DELETE FROM produtos WHERE id = :id");
            $stmt->execute([':id' => $id]);
            
            // Redireciona de volta com mensagem de sucesso
            header("Location: ../admin_produtos.php?sucesso=excluido");
            exit;
            
        } catch (PDOException $e) {
            header("Location: ../admin_produtos.php?erro=db");
            exit;
        }
    }
}

// Se não tiver ID válido, apenas devolve para a página principal
header("Location: ../admin_produtos.php");
exit;