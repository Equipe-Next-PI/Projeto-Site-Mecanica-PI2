<?php
/* ============================================================
   AÇÃO DE CADASTRO DE PRODUTOS — EQUIPA NEXT
   ============================================================ */
session_start();

// 1. IMPORTA A CONEXÃO COM A BASE DE DADOS
require_once '../config/conexao.php';

// 2. VERIFICA SE O FORMULÁRIO FOI SUBMETIDO CORRETAMENTE
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    // Captura e sanitiza os dados do formulário para evitar código malicioso
    $nome      = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $preco     = filter_input(INPUT_POST, 'preco', FILTER_VALIDATE_FLOAT);
    $estoque   = filter_input(INPUT_POST, 'estoque', FILTER_VALIDATE_INT);
    $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);
    
    // Define um caminho de imagem padrão provisório (visto que a tabela exige este campo)
    $imagem = './assets/img/default.png'; 

    // 3. VALIDAÇÃO DOS CAMPOS
    if ($nome && $preco !== false && $estoque !== false && $descricao) {
        try {
            // Prepara a instrução SQL estruturada (Proteção total contra SQL Injection)
            $sql = "INSERT INTO produtos (nome, descricao, preco, estoque, imagem) 
                    VALUES (:nome, :descricao, :preco, :estoque, :imagem)";
            
            $stmt = $pdo->prepare($sql);
            
            // Executa passando os valores mapeados
            $stmt->execute([
                ':nome'      => $nome,
                ':descricao' => $descricao,
                ':preco'     => $preco,
                ':estoque'   => $estoque,
                ':imagem'    => $imagem
            ]);

            // Redireciona de volta para o painel com uma mensagem de sucesso na URL
            header("Location: ../admin_produtos.php?sucesso=1");
            exit;

        } catch (PDOException $e) {
            // Em caso de erro na base de dados, redireciona com o código do erro
            header("Location: ../admin_produtos.php?erro=db");
            exit;
        }
    } else {
        // Se algum campo falhar na validação de tipo
        header("Location: ../admin_produtos.php?erro=validacao");
        exit;
    }
} else {
    // Se tentarem aceder a este ficheiro diretamente pela URL, bloqueia e redireciona
    header("Location: ../admin_produtos.php");
    exit;
}