<?php
session_start();
require_once '../../config/conexao.php';

if (!isset($_SESSION['usuario_id']) || $_SESSION['nivel_acesso'] !== 'admin') {
    header("Location: ../../login.php");
    exit;
}

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$id) {
    header("Location: ../../admin_formularios.php");
    exit;
}

try {
    $stmt = $pdo->prepare("SELECT * FROM contatos WHERE id = :id");
    $stmt->execute([':id' => $id]);
    $mensagem = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$mensagem) {
        header("Location: ../../admin_formularios.php");
        exit;
    }

    if ($mensagem['status'] === 'nao_lido') {
        $update = $pdo->prepare("UPDATE contatos SET status = 'lido' WHERE id = :id");
        $update->execute([':id' => $id]);
        $mensagem['status'] = 'lido';
    }

    $stmtLista = $pdo->query("SELECT id, nome, marca_veiculo, tipo_servico, status, data_envio FROM contatos ORDER BY id DESC");
    $mensagens = $stmtLista->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erro ao carregar mensagem.");
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ler Mensagem | Equipe NEXT</title>
    <link rel="stylesheet" href="../../assets/global.css" />
    <link rel="stylesheet" href="../../assets/admin.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" />
</head>
<body class="message-read-page">

    <div class="message-read-bg" aria-hidden="true">
        <header class="admin-nav">
            <div class="logo"><div class="logo2">EQUIPE <span>NEXT</span></div></div>
            <div class="admin-nav-links">
                <a href="../../admin_produtos.php">Produtos / Estoque</a>
                <a href="../../admin_usuarios.php">Gerenciar Equipe</a>
                <a href="../../admin_formularios.php" class="active">Mensagens</a>
                <a href="../../modules/auth/logout.php" class="btn-logout-nav">Sair</a>
            </div>
        </header>

        <main class="admin-container admin-container--full">
            <section class="admin-content admin-content--wide">
                <div class="content-header">
                    <h1>Caixa de Entrada do Site</h1>
                </div>
                <div class="table-container">
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>Data</th>
                                <th>Cliente</th>
                                <th>Veículo</th>
                                <th>Serviço Solicitado</th>
                                <th>Status</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($mensagens as $msg): ?>
                                <?php
                                    $rowClass = $msg['status'] === 'nao_lido' ? 'row-unread' : 'row-read';
                                    $isActive = (int) $msg['id'] === (int) $id;
                                ?>
                                <tr class="<?php echo $rowClass; ?><?php echo $isActive ? ' row-active' : ''; ?>">
                                    <td><?php echo date('d/m/Y H:i', strtotime($msg['data_envio'])); ?></td>
                                    <td><?php echo htmlspecialchars($msg['nome']); ?></td>
                                    <td><?php echo htmlspecialchars($msg['marca_veiculo']); ?></td>
                                    <td><?php echo htmlspecialchars($msg['tipo_servico']); ?></td>
                                    <td>
                                        <?php if ($msg['status'] === 'nao_lido'): ?>
                                            <span class="badge-nova">NOVA</span>
                                        <?php elseif ($msg['status'] === 'lido'): ?>
                                            <span class="badge-lida">LIDA</span>
                                        <?php else: ?>
                                            <span class="badge-concluida">CONCLUÍDA</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="td-acoes">
                                        <span class="btn-editar btn-ler">Ler</span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </main>
    </div>

    <div class="message-read-overlay" aria-hidden="true"></div>

    <div class="message-read-card-wrapper">
        <div class="edit-card wide message-detail-card">
            <div class="edit-card-header">
                <h2>Solicitação de Orçamento</h2>
                <span class="meta-date"><?php echo date('d/m/Y H:i', strtotime($mensagem['data_envio'])); ?></span>
            </div>

            <div class="detail-grid">
                <div class="detail-field">
                    <p class="label">Cliente:</p>
                    <p class="value"><?php echo htmlspecialchars($mensagem['nome']); ?></p>
                </div>
                <div class="detail-field">
                    <p class="label">E-mail:</p>
                    <p class="value"><?php echo htmlspecialchars($mensagem['email']); ?></p>
                </div>
                <div class="detail-field">
                    <p class="label">Telefone Fixo:</p>
                    <p class="value"><?php echo htmlspecialchars($mensagem['telefone']) ?: 'Não informado'; ?></p>
                </div>
                <div class="detail-field">
                    <p class="label">Telefone (Celular):</p>
                    <p class="value"><?php echo htmlspecialchars($mensagem['celular']); ?></p>
                </div>
                <div class="detail-field">
                    <p class="label">Marca do Veículo:</p>
                    <p class="value highlight"><?php echo htmlspecialchars($mensagem['marca_veiculo']); ?></p>
                </div>
                <div class="detail-field">
                    <p class="label">Modelo e Ano:</p>
                    <p class="value highlight"><?php echo htmlspecialchars($mensagem['modelo_ano']); ?></p>
                </div>
            </div>

            <div class="detail-field detail-field--spaced">
                <p class="label">Tipo de Serviço:</p>
                <p class="value orange"><?php echo htmlspecialchars($mensagem['tipo_servico']); ?></p>
            </div>

            <div class="detail-block">
                <p class="label">Descrição do Problema:</p>
                <p class="value"><?php echo htmlspecialchars($mensagem['descricao_problema']); ?></p>
            </div>

            <div class="text-right">
                <a href="../../admin_formularios.php" class="btn-voltar">Voltar para Mensagens</a>
            </div>
        </div>
    </div>

</body>
</html>
