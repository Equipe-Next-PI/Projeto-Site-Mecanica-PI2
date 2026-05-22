<?php
session_start();
require_once './config/conexao.php'; 

if (!isset($_SESSION['usuario_id']) || $_SESSION['nivel_acesso'] !== 'admin') {
    header("Location: ./login.php?erro=acesso_negado");
    exit;
}

try {
    $stmt = $pdo->query("SELECT id, nome, marca_veiculo, tipo_servico, status, data_envio FROM contatos ORDER BY id DESC");
    $mensagens = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erro ao carregar mensagens: " . $e->getMessage());
}

$sucesso = isset($_GET['sucesso']) ? $_GET['sucesso'] : null;
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Caixa de Entrada | Equipe NEXT</title>
    <link rel="stylesheet" href="./assets/global.css" />
    <link rel="stylesheet" href="./assets/admin.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap" />
</head>
<body>

    <header class="admin-nav">
        <div class="logo"><div class="logo2">EQUIPE <span style="color: #ff6b00;">NEXT</span></div></div>
        <div class="admin-nav-links">
            <a href="./admin_produtos.php">Produtos / Estoque</a>
            <a href="./admin_usuarios.php">Gerenciar Equipe</a>
            <a href="./admin_formularios.php" class="active">Mensagens</a>
            <a href="./modules/auth/logout.php" style="color: #dc3545; font-weight: 700;">Sair</a>
        </div>
    </header>

    <main class="admin-container" style="justify-content: center;">
        
        <section class="admin-content" style="flex: 0 0 100%; max-width: 1100px;">
            <div class="content-header">
                <h1>Caixa de Entrada do Site</h1>
                
                <?php if ($sucesso === 'excluido'): ?>
                    <div style="background-color: #d4edda; color: #155724; padding: 10px; margin-top: 15px; border-radius: 4px;">Mensagem excluída com sucesso.</div>
                <?php elseif ($sucesso === 'concluido'): ?>
                    <div style="background-color: #d4edda; color: #155724; padding: 10px; margin-top: 15px; border-radius: 4px;">Orçamento marcado como concluído com sucesso!</div>
                <?php endif; ?>
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
                        <?php if (count($mensagens) > 0): ?>
                            <?php foreach ($mensagens as $msg): ?>
                                <?php 
                                // Define o estilo do texto com base no status
                                $negrito = $msg['status'] === 'nao_lido' ? 'font-weight: 800; color: #000;' : 'font-weight: 400; color: #555;'; 
                                ?>
                                <tr>
                                    <td style="<?php echo $negrito; ?>"><?php echo date('d/m/Y H:i', strtotime($msg['data_envio'])); ?></td>
                                    <td style="<?php echo $negrito; ?>"><?php echo htmlspecialchars($msg['nome']); ?></td>
                                    <td style="<?php echo $negrito; ?>"><?php echo htmlspecialchars($msg['marca_veiculo']); ?></td>
                                    <td style="<?php echo $negrito; ?>"><?php echo htmlspecialchars($msg['tipo_servico']); ?></td>
                                    <td>
                                        <?php if ($msg['status'] === 'nao_lido'): ?>
                                            <span style="padding: 4px 8px; border-radius: 4px; font-size: 11px; font-weight: 600; background: #ffe8d6; color: #ff6b00;">NOVA</span>
                                        <?php elseif ($msg['status'] === 'lido'): ?>
                                            <span style="padding: 4px 8px; border-radius: 4px; font-size: 11px; font-weight: 600; background: #e2eefa; color: #004085;">LIDA</span>
                                        <?php else: ?>
                                            <span style="padding: 4px 8px; border-radius: 4px; font-size: 11px; font-weight: 600; background: #d4edda; color: #155724;">CONCLUÍDA</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="td-acoes">
                                        <a href="./modules/formularios/formulario_ver.php?id=<?php echo $msg['id']; ?>" class="btn-editar" style="background-color: #28a745;">Ler</a>
                                        
                                        <?php if ($msg['status'] !== 'concluido'): ?>
                                            <a href="./modules/formularios/formulario_concluir.php?id=<?php echo $msg['id']; ?>" class="btn-editar" style="background-color: #0056b3;">Concluir</a>
                                        <?php endif; ?>

                                        <a href="./modules/formularios/formulario_excluir.php?id=<?php echo $msg['id']; ?>" class="btn-excluir" onclick="return confirm('Excluir esta mensagem?');">Excluir</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr><td colspan="6" style="text-align: center;">Nenhuma mensagem recebida ainda.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </section>

    </main>
</body>
</html>