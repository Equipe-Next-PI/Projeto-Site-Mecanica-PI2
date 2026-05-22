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
    // Busca a mensagem completa
    $stmt = $pdo->prepare("SELECT * FROM contatos WHERE id = :id");
    $stmt->execute([':id' => $id]);
    $mensagem = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$mensagem) {
        header("Location: ../../admin_formularios.php");
        exit;
    }

    // Se estiver não lida, muda o status para lida no banco de dados automaticamente ao abrir
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
</head>
<body style="display: flex; justify-content: center; align-items: center; min-height: 100vh; background-color: #f4f7f6; padding: 20px;">

    <div class="form-container" style="width: 100%; max-width: 700px; background: white; padding: 40px; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
        
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; border-bottom: 1px solid #eee; padding-bottom: 15px;">
            <h2 style="color: #1f3a5f; margin: 0;">Solicitação de Orçamento</h2>
            <span style="font-size: 13px; color: #888;"><?php echo date('d/m/Y H:i', strtotime($mensagem['data_envio'])); ?></span>
        </div>
        
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
            <div>
                <p style="margin: 0 0 5px 0; font-size: 13px; font-weight: 600; color: #555;">Cliente:</p>
                <p style="margin: 0; font-size: 15px; color: #222;"><?php echo htmlspecialchars($mensagem['nome']); ?></p>
            </div>
            <div>
                <p style="margin: 0 0 5px 0; font-size: 13px; font-weight: 600; color: #555;">E-mail:</p>
                <p style="margin: 0; font-size: 15px; color: #222;"><?php echo htmlspecialchars($mensagem['email']); ?></p>
            </div>
            <div>
                <p style="margin: 0 0 5px 0; font-size: 13px; font-weight: 600; color: #555;">Telefone Fixo:</p>
                <p style="margin: 0; font-size: 15px; color: #222;"><?php echo htmlspecialchars($mensagem['telefone']) ?: 'Não informado'; ?></p>
            </div>
            <div>
                <p style="margin: 0 0 5px 0; font-size: 13px; font-weight: 600; color: #555;">Telefone (Celular):</p>
                <p style="margin: 0; font-size: 15px; color: #222;"><?php echo htmlspecialchars($mensagem['celular']); ?></p>
            </div>
            <div>
                <p style="margin: 0 0 5px 0; font-size: 13px; font-weight: 600; color: #555;">Marca do Veículo:</p>
                <p style="margin: 0; font-size: 15px; font-weight: 600; color: #1f3a5f;"><?php echo htmlspecialchars($mensagem['marca_veiculo']); ?></p>
            </div>
            <div>
                <p style="margin: 0 0 5px 0; font-size: 13px; font-weight: 600; color: #555;">Modelo e Ano:</p>
                <p style="margin: 0; font-size: 15px; font-weight: 600; color: #1f3a5f;"><?php echo htmlspecialchars($mensagem['modelo_ano']); ?></p>
            </div>
        </div>

        <div style="margin-bottom: 20px;">
            <p style="margin: 0 0 5px 0; font-size: 13px; font-weight: 600; color: #555;">Tipo de Serviço:</p>
            <p style="margin: 0; font-size: 15px; color: #ff6b00; font-weight: 600;"><?php echo htmlspecialchars($mensagem['tipo_servico']); ?></p>
        </div>

        <div style="background: #f9f9f9; padding: 20px; border-radius: 6px; border: 1px solid #e1e1e1; margin-bottom: 25px;">
            <p style="margin: 0 0 10px 0; font-size: 13px; font-weight: 600; color: #555;">Descrição do Problema:</p>
            <p style="margin: 0; font-size: 15px; color: #333; line-height: 1.6; white-space: pre-wrap;"><?php echo htmlspecialchars($mensagem['descricao_problema']); ?></p>
        </div>

        <div style="text-align: right;">
            <a href="../../admin_formularios.php" class="btn-salvar" style="text-decoration: none; display: inline-block; padding: 10px 20px; background-color: #6c757d;">Voltar para Mensagens</a>
        </div>
    </div>

</body>
</html>