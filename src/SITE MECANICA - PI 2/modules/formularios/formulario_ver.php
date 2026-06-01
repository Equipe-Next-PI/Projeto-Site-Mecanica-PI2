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
    }
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
<body class="page-centered-body">

    <div class="edit-card wide">
        
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

</body>
</html>