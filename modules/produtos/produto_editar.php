<?php
session_start();
require_once '../../config/conexao.php';

if (!isset($_SESSION['usuario_id']) || $_SESSION['nivel_acesso'] !== 'admin') {
    header("Location: ../../login.php");
    exit;
}

$erro = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id           = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
    $nome         = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $preco        = filter_input(INPUT_POST, 'preco', FILTER_VALIDATE_FLOAT);
    $estoque      = filter_input(INPUT_POST, 'estoque', FILTER_VALIDATE_INT);
    $descricao    = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);
    $imagem_atual = filter_input(INPUT_POST, 'imagem_atual', FILTER_SANITIZE_URL);

    $caminho_bd = $imagem_atual;

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
                
                if ($imagem_atual && $imagem_atual !== './assets/img/default.png' && file_exists('../../' . ltrim($imagem_atual, './'))) {
                    unlink('../../' . ltrim($imagem_atual, './'));
                }
            }
        } else {
            $erro = "Extensão de imagem não permitida.";
        }
    }

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
            header("Location: ../../admin_produtos.php?sucesso=editado");
            exit;
        } catch (PDOException $e) {
            $erro = "Erro ao atualizar na base de dados.";
        }
    }
}

$id_get = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$id_get && $_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: ../../admin_produtos.php");
    exit;
}

$id_busca = $id_get ? $id_get : $id;

try {
    $stmt = $pdo->prepare("SELECT id, nome, descricao, preco, estoque, imagem FROM produtos WHERE id = :id");
    $stmt->execute([':id' => $id_busca]);
    $produto = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$produto) {
        header("Location: ../../admin_produtos.php");
        exit;
    }
} catch (PDOException $e) {
    die("Erro ao buscar produto.");
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Editar Produto | Equipe NEXT</title>
    <link rel="stylesheet" href="../../assets/global.css" />
    <link rel="stylesheet" href="../../assets/admin.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" />
</head>
<body class="page-centered-body">

    <div class="edit-card">
        <h2>Editar Produto #<?php echo $produto['id']; ?></h2>
        
        <?php if ($erro): ?>
            <div class="alert alert-danger"><?php echo $erro; ?></div>
        <?php endif; ?>

        <form action="produto_editar.php" method="POST" enctype="multipart/form-data" class="admin-form">
            <input type="hidden" name="id" value="<?php echo $produto['id']; ?>" />
            <input type="hidden" name="imagem_atual" value="<?php echo $produto['imagem']; ?>" />
            
            <label class="form-label">Nome do Produto</label>
            <input type="text" name="nome" required value="<?php echo htmlspecialchars($produto['nome']); ?>" class="form-field" />
            
            <label class="form-label">Preço (R$)</label>
            <input type="number" step="0.01" name="preco" required value="<?php echo $produto['preco']; ?>" class="form-field" />
            
            <label class="form-label">Quantidade em Estoque</label>
            <input type="number" name="estoque" required value="<?php echo $produto['estoque']; ?>" class="form-field" />
            
            <label class="form-label">Descrição</label>
            <textarea name="descricao" rows="4" required class="form-field"><?php echo htmlspecialchars($produto['descricao']); ?></textarea>

            <label class="form-label">Imagem Atual:</label>
            <div class="image-preview">
                <img src="../../<?php echo ltrim($produto['imagem'], './'); ?>" alt="Imagem atual">
            </div>

            <label class="form-label">Substituir Imagem (Opcional):</label>
            <input type="file" name="imagem" accept="image/png, image/jpeg, image/jpg" class="form-file-input" />

            <div class="form-actions">
                <button type="submit" class="btn-salvar">Salvar Alterações</button>
                <a href="../../admin_produtos.php" class="btn-cancelar">Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>
