<?php
session_start();

/*
if (!isset($_SESSION['usuario_id']) || $_SESSION['nivel_acesso'] !== 'admin') {
    header("Location: ./login.php");
    exit;
}
*/

require_once './config/conexao.php';

$busca = isset($_GET['busca']) ? trim($_GET['busca']) : '';

try {
    if ($busca !== '') {
        $sql = "SELECT id, nome, descricao, preco, estoque FROM produtos 
                WHERE nome LIKE :busca OR descricao LIKE :busca ORDER BY id DESC";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':busca' => '%' . $busca . '%']);
    } else {
        $stmt = $pdo->query("SELECT id, nome, descricao, preco, estoque FROM produtos ORDER BY id DESC");
    }
    $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erro ao carregar produtos: " . $e->getMessage());
}

$sucesso = isset($_GET['sucesso']) ? $_GET['sucesso'] : null;
$erro    = isset($_GET['erro'])    ? $_GET['erro']    : null;
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin - Cadastro de Produtos | Equipe NEXT</title>
    <link rel="stylesheet" href="./assets/global.css" />
    <link rel="stylesheet" href="./assets/admin.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" />
</head>
<body>

    <header class="admin-nav">
        <div class="logo">
            <div class="logo2">EQUIPE <span>NEXT</span></div>
        </div>
        <div class="admin-nav-links">
            <a href="./admin_produtos.php" class="active">Produtos / Estoque</a>
            <a href="./admin_usuarios.php">Gerenciar Equipe</a>
            <a href="./admin_formularios.php">Mensagens</a>
            <a href="./modules/auth/logout.php" class="btn-logout-nav">Sair</a>
        </div>
    </header>

    <main class="admin-container">

        <section class="admin-content">
            <div class="content-header">
                <?php if ($sucesso === '1'): ?>
                    <div class="alert alert-success">Produto cadastrado com sucesso!</div>
                <?php elseif ($sucesso === 'editado'): ?>
                    <div class="alert alert-info">Produto atualizado com sucesso!</div>
                <?php elseif ($sucesso === 'excluido'): ?>
                    <div class="alert alert-success">Produto excluído com sucesso!</div>
                <?php endif; ?>

                <?php if ($erro === 'validacao'): ?>
                    <div class="alert alert-danger">Por favor, preencha todos os campos com valores válidos.</div>
                <?php endif; ?>
                <h1>Cadastro de Produtos</h1>
            </div>

            <div class="table-container">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Produto</th>
                            <th>Descrição</th>
                            <th>Preço</th>
                            <th>Estoque</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($produtos) > 0): ?>
                            <?php foreach ($produtos as $produto): ?>
                                <tr>
                                    <td><?php echo $produto['id']; ?></td>
                                    <td><?php echo htmlspecialchars($produto['nome']); ?></td>
                                    <td title="<?php echo htmlspecialchars($produto['descricao']); ?>">
                                        <?php echo mb_strimwidth(htmlspecialchars($produto['descricao']), 0, 30, "..."); ?>
                                    </td>
                                    <td>R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?></td>
                                    <td><?php echo $produto['estoque']; ?></td>
                                    <td class="td-acoes">
                                        <a href="./modules/produtos/produto_editar.php?id=<?php echo $produto['id']; ?>" class="btn-editar">Editar</a>
                                        <a href="./modules/produtos/produto_excluir.php?id=<?php echo $produto['id']; ?>" class="btn-excluir" onclick="return confirm('Tem certeza que deseja excluir o produto <?php echo htmlspecialchars($produto['nome']); ?>?');">Excluir</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="td-empty">Nenhum produto cadastrado no momento.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </section>

        <aside class="admin-sidebar">

            <div class="search-box">
                <form action="admin_produtos.php" method="GET" class="form-pesquisa">
                    <div class="input-group">
                        <input type="text" name="busca" placeholder="Pesquisar produto..." class="search-input"
                            value="<?php echo htmlspecialchars($busca); ?>" />
                        <button type="submit" class="btn-pesquisar">Buscar</button>
                    </div>
                    <?php if ($busca !== ''): ?>
                        <a href="admin_produtos.php" class="link-limpar">Limpar pesquisa</a>
                    <?php endif; ?>
                </form>
            </div>

            <div class="form-container">
                <h3>Registre seu produto</h3>
                <form action="./modules/produtos/produto_action.php" method="POST" enctype="multipart/form-data" class="admin-form">
                    <input type="text" name="nome" placeholder="Produto" required />
                    <input type="number" step="0.01" name="preco" placeholder="Preço" required />
                    <input type="number" name="estoque" placeholder="Estoque" required />
                    <textarea name="descricao" placeholder="Descrição" rows="4" required></textarea>

                    <label class="label-imagem">Imagem do Produto:</label>
                    <input type="file" name="imagem" accept="image/png, image/jpeg, image/jpg" class="form-file-input" required />

                    <button type="submit" class="btn-salvar">Salvar Produto</button>
                </form>
            </div>

        </aside>

    </main>
</body>
</html>
