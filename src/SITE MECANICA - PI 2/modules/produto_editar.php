<?php
/* ============================================================
   TELA E AÇÃO DE EDIÇÃO DE PRODUTOS COM UPLOAD DE IMAGEM
   ============================================================ */
session_start();
require_once '../config/conexao.php';

$erro = '';

// 1. SE O FORMULÁRIO FOR SUBMETIDO (Executa o UPDATE)
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id          = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
    $nome        = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $preco       = filter_input(INPUT_POST, 'preco', FILTER_VALIDATE_FLOAT);
    $estoque     = filter_input(INPUT_POST, 'estoque', FILTER_VALIDATE_INT);
    $descricao   = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);
    $imagem_atual = filter_input(INPUT_POST, 'imagem_atual', FILTER_SANITIZE_URL);

    // O caminho padrão será a imagem que o produto já tinha
    $caminho_bd = $imagem_atual;

    // LÓGICA DE UPLOAD DE NOVA IMAGEM (Só roda se o utilizador escolher um ficheiro novo)
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
        $pasta_destino = '../assets/img/uploads/';
        $nome_arquivo_original = $_FILES['imagem']['name'];
        $arquivo_tmp = $_FILES['imagem']['tmp_name'];
        
        $extensao = strtolower(pathinfo($nome_arquivo_original, PATHINFO_EXTENSION));
        $extensoes_permitidas = ['jpg', 'jpeg', 'png', 'webp'];
        
        if (in_array($extensao, $extensoes_permitidas)) {
            $novo_nome_arquivo = uniqid('prod_') . '.' . $extensao;
            $caminho_completo = $pasta_destino . $novo_nome_arquivo;
            
            if (move_uploaded_file($arquivo_tmp, $caminho_completo)) {
                $caminho_bd = './assets/img/uploads/' . $novo_nome_arquivo;
                
                // [Opcional] Aqui podes apagar a imagem antiga do servidor para não acumular lixo
                if ($imagem_atual && $imagem_atual !== './assets/img/default.png' && file_exists('../' . $imagem_atual)) {
                    unlink('../' . $imagem_atual);
                }
            }
        } else {
            $erro = "Extensão de imagem não permitida. Use JPG, JPEG, PNG ou WEBP.";
        }
    }

    // Executa a atualização se não houver erros de validação
    if (empty($erro) && $id && $nome && $preco !== false && $estoque !== false && $descricao) {
        try {
            $sql = "UPDATE produtos SET nome = :nome, preco = :preco, estoque = :estoque, descricao = :descricao, imagem = :imagem WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':nome'      => $nome,
                ':preco'     => $preco,
                ':estoque'   => $estoque,
                ':descricao' => $descricao,
                ':imagem'    => $caminho_bd,
                ':id'        => $id
            ]);
            
            header("Location: ../admin_produtos.php?sucesso=editado");
            exit;
        } catch (PDOException $e) {
            $erro = "Erro ao atualizar na base de dados: " . $e->getMessage();
        }
    } elseif (empty($erro)) {
        $erro = "Preencha todos os campos corretamente.";
    }
}

// 2. BUSCA OS DADOS PARA PREENCHER O FORMULÁRIO (GET)
$id_get = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$id_get && $_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: ../admin_produtos.php");
    exit;
}

$id_busca = $id_get ? $id_get : $id;

try {
    $stmt = $pdo->prepare("SELECT id, nome, descricao, preco, estoque, imagem FROM produtos WHERE id = :id");
    $stmt->execute([':id' => $id_busca]);
    $produto = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$produto) {
        header("Location: ../admin_produtos.php");
        exit;
    }
} catch (PDOException $e) {
    die("Erro ao buscar produto: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Editar Produto | Equipe NEXT</title>
    <link rel="stylesheet" href="../assets/global.css" />
    <link rel="stylesheet" href="../assets/admin.css" />
</head>
<body style="display: flex; justify-content: center; align-items: center; min-height: 100vh; background-color: #f4f7f6; padding: 20px;">

    <div class="form-container" style="width: 100%; max-width: 500px; background: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
        
        <h2 style="color: #1f3a5f; margin-bottom: 20px;">Editar Produto #<?php echo $produto['id']; ?></h2>
        
        <?php if ($erro): ?>
            <div style="background-color: #f8d7da; color: #721c24; padding: 10px; margin-bottom: 15px; border-radius: 4px;">
                <?php echo $erro; ?>
            </div>
        <?php endif; ?>

        <form action="produto_editar.php" method="POST" enctype="multipart/form-data" class="admin-form">
            
            <input type="hidden" name="id" value="<?php echo $produto['id']; ?>" />
            <input type="hidden" name="imagem_atual" value="<?php echo $produto['imagem']; ?>" />
            
            <label style="font-size: 13px; font-weight: 600;">Nome do Produto</label>
            <input type="text" name="nome" required value="<?php echo htmlspecialchars($produto['nome']); ?>" style="margin-bottom: 15px; border: 1px solid #ccc; padding: 10px; border-radius: 4px; width: 100%;" />
            
            <label style="font-size: 13px; font-weight: 600;">Preço (R$)</label>
            <input type="number" step="0.01" name="preco" required value="<?php echo $produto['preco']; ?>" style="margin-bottom: 15px; border: 1px solid #ccc; padding: 10px; border-radius: 4px; width: 100%;" />
            
            <label style="font-size: 13px; font-weight: 600;">Quantidade em Estoque</label>
            <input type="number" name="estoque" required value="<?php echo $produto['estoque']; ?>" style="margin-bottom: 15px; border: 1px solid #ccc; padding: 10px; border-radius: 4px; width: 100%;" />
            
            <label style="font-size: 13px; font-weight: 600;">Descrição</label>
            <textarea name="descricao" rows="4" required style="margin-bottom: 15px; border: 1px solid #ccc; padding: 10px; border-radius: 4px; width: 100%; font-family: inherit;"><?php echo htmlspecialchars($produto['descricao']); ?></textarea>

            <label style="font-size: 13px; font-weight: 600; display: block; margin-bottom: 5px;">Imagem Atual:</label>
            <div style="margin-bottom: 15px; text-align: center; background: #f9f9f9; padding: 10px; border-radius: 4px;">
                <img src="../<?php echo $produto['imagem']; ?>" alt="Imagem atual" style="max-width: 120px; max-height: 120px; object-fit: contain; border-radius: 4px;">
            </div>

            <label style="font-size: 13px; font-weight: 600;">Substituir Imagem (Opcional):</label>
            <input type="file" name="imagem" accept="image/png, image/jpeg, image/jpg" style="margin-bottom: 20px; width: 100%;" />

            <div style="display: flex; gap: 10px;">
                <button type="submit" class="btn-salvar" style="flex: 1;">Salvar Alterações</button>
                <a href="../admin_produtos.php" class="btn-excluir" style="flex: 1; text-align: center; line-height: 2.8; border-radius: 4px; background-color: #6c757d;">Cancelar</a>
            </div>
        </form>
    </div>

</body>
</html>