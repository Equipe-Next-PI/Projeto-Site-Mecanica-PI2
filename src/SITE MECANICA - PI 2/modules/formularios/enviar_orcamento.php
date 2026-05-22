<?php
/* ============================================================
   AÇÃO DE ENVIO DE ORÇAMENTO — PASTA FORMULÁRIOS
   ============================================================ */
session_start();
require_once '../../config/conexao.php'; 

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nome      = trim($_POST['nome'] ?? '');
    $email     = trim($_POST['email'] ?? '');
    $telefone  = trim($_POST['telefone'] ?? '');
    $celular   = trim($_POST['celular'] ?? '');
    $marca     = trim($_POST['marca'] ?? '');
    $modelo    = trim($_POST['modelo'] ?? '');
    $servico   = trim($_POST['servico'] ?? '');
    $descricao = trim($_POST['descricao'] ?? '');

    if ($nome && $email && $celular && $marca && $modelo && $servico && $descricao) {
        
        try {
            $sql = "INSERT INTO contatos (nome, email, telefone, celular, marca_veiculo, modelo_ano, tipo_servico, descricao_problema) 
                    VALUES (:nome, :email, :telefone, :celular, :marca_veiculo, :modelo_ano, :tipo_servico, :descricao_problema)";
            
            $stmt = $pdo->prepare($sql);
            
            $stmt->execute([
                ':nome'               => $nome,
                ':email'              => $email,
                ':telefone'           => $telefone,
                ':celular'            => $celular,
                ':marca_veiculo'      => $marca,
                ':modelo_ano'         => $modelo,
                ':tipo_servico'       => $servico,
                ':descricao_problema' => $descricao
            ]);

            header("Location: ../../index.php?sucesso=1#contato");
            exit;

        } catch (PDOException $e) {
            header("Location: ../../index.php?erro=db#contato");
            exit;
        }
        
    } else {
        header("Location: ../../index.php?erro=campos_vazios#contato");
        exit;
    }
} else {
    header("Location: ../../index.php");
    exit;
}