<?php
// 1. INICIALIZA A SESSÃO E VERIFICA SE ESTÁ LOGADO COMO ADMIN
session_start();

// Descomente o bloco abaixo para bloquear a página de quem não fez login
/*
if (!isset($_SESSION['usuario_id']) || $_SESSION['nivel_acesso'] !== 'admin') {
    header("Location: ./login.php");
    exit;
}
*/

// 2. CONECTA AO BANCO DE DADOS
// (Ajuste o caminho se o arquivo admin_produtos estiver fora da pasta src)
require_once './config/conexao.php';

// 3. BUSCA OS PRODUTOS NO BANCO
try {
    $stmt = $pdo->query("SELECT id, nome, descricao, preco, estoque FROM produtos ORDER BY id DESC");
    $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erro ao carregar produtos: " . $e->getMessage());
}
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
            <div class="logo2">Logo</div>
        </div>
        <div class="admin-nav-links">
            <a href="#" class="active">Produtos</a>
            <a href="#">Formulário</a>
            <a href="#">Contato</a>
        </div>
    </header>

    <main class="admin-container">

        <section class="admin-content">
            <div class="content-header">
                <?php
                $sucesso = isset($_GET['sucesso']) ? $_GET['sucesso'] : null;
                $erro = isset($_GET['erro']) ? $_GET['erro'] : null;
                ?>

                <?php if ($sucesso): ?>
                    <div style="background-color: #d4edda; color: #155724; padding: 10px; margin-bottom: 15px; border-radius: 4px;">
                        Produto cadastrado com sucesso!
                    </div>
                <?php endif; ?>

                <?php if ($erro === 'validacao'): ?>
                    <div style="background-color: #f8d7da; color: #721c24; padding: 10px; margin-bottom: 15px; border-radius: 4px;">
                        Por favor, preencha todos os campos com valores válidos.
                    </div>
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
                                        <a href="./modules/produto_editar.php?id=<?php echo $produto['id']; ?>" class="btn-editar">Editar</a>

                                        <a href="./modules/produto_excluir.php?id=<?php echo $produto['id']; ?>" class="btn-excluir" onclick="return confirm('Tem certeza que deseja excluir o produto <?php echo htmlspecialchars($produto['nome']); ?>?');">Excluir</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" style="text-align: center;">Nenhum produto cadastrado no momento.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </section>

        <aside class="admin-sidebar">

            <div class="search-box">
                <input type="text" placeholder="Pesquisar" class="search-input" />
            </div>

            <div class="form-container">
                <h3>Registre seu produto</h3>

                <form action="./modules/produto_action.php" method="POST" class="admin-form">
                    <input type="text" name="nome" placeholder="Produto" required />

                    <input type="number" step="0.01" name="preco" placeholder="Preço" required />

                    <input type="number" name="estoque" placeholder="Estoque" required />
                    <textarea name="descricao" placeholder="Descrição" rows="4" required></textarea>

                    <button type="submit" class="btn-salvar">Salvar Produto</button>
                </form>
            </div>

        </aside>

    </main>
</body>

</html>