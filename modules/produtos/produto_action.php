<?php
session_start();
require_once '../../config/conexao.php';

if (!isset($_SESSION['usuario_id']) || $_SESSION['nivel_acesso'] !== 'admin') {
    header("Location: ../../login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome      = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $preco     = filter_input(INPUT_POST, 'preco', FILTER_VALIDATE_FLOAT);
    $estoque   = filter_input(INPUT_POST, 'estoque', FILTER_VALIDATE_INT);
    $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);
    
    $caminho_bd = './assets/img/default.png';

    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
        $pasta_destino = '../../assets/img/uploads/';
        $nome_arquivo_original = $_FILES['imagem']['name'];
        $arquivo_tmp = $_FILES['imagem']['tmp_name'];
        
        $extensao = strtolower(pathinfo($nome_arquivo_original, PATHINFO_EXTENSION));
        $extensoes_permitidas = ['jpg', 'jpeg', 'png', 'webp'];
        
        if (in_array($extensao, $extensoes_permitidas)) {
            $novo_nome_arquivo = uniqid('prod_') . '.' . $extensao;
            $caminho_completo = $pasta_destino . $novo_nome_arquivo;
            
            if (move_uploaded_file($arquivo_tmp, $caminho_completo)) {
                $caminho_bd = './assets/img/uploads/' . $novo_nome_arquivo;
            }
        }
    }

    if ($nome && $preco !== false && $estoque !== false && $descricao) {
        try {
            $sql = "INSERT INTO produtos (nome, descricao, preco, estoque, imagem) 
                    VALUES (:nome, :descricao, :preco, :estoque, :imagem)";
            
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':nome'      => $nome,
                ':descricao' => $descricao,
                ':preco'     => $preco,
                ':estoque'   => $estoque,
                ':imagem'    => $caminho_bd
            ]);

            header("Location: ../../admin_produtos.php?sucesso=1");
            exit;

        } catch (PDOException $e) {
            header("Location: ../../admin_produtos.php?erro=db");
            exit;
        }
    } else {
        header("Location: ../../admin_produtos.php?erro=validacao");
        exit;
    }
} else {
    header("Location: ../../admin_produtos.php");
    exit;
}