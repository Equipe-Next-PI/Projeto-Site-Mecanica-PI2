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
    $sobrenome    = filter_input(INPUT_POST, 'sobrenome', FILTER_SANITIZE_SPECIAL_CHARS);
    $email        = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $nivel_acesso = filter_input(INPUT_POST, 'nivel_acesso', FILTER_SANITIZE_SPECIAL_CHARS);

    if ($id && $nome && $sobrenome && $email) {
        try {
            $sql = "UPDATE usuarios SET nome = :nome, sobrenome = :sobrenome, email = :email, nivel_acesso = :nivel_acesso WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':nome'         => $nome,
                ':sobrenome'    => $sobrenome,
                ':email'        => $email,
                ':nivel_acesso' => $nivel_acesso,
                ':id'           => $id
            ]);
            
            header("Location: ../../admin_usuarios.php?sucesso=editado");
            exit;
        } catch (PDOException $e) {
            $erro = "Erro ao atualizar no banco.";
        }
    } else {
        $erro = "Preencha todos os campos corretamente.";
    }
}

$id_get = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$id_get && $_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: ../../admin_usuarios.php");
    exit;
}

$id_busca = $id_get ? $id_get : $id;

try {
    $stmt = $pdo->prepare("SELECT id, nome, sobrenome, email, nivel_acesso FROM usuarios WHERE id = :id");
    $stmt->execute([':id' => $id_busca]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$usuario) {
        header("Location: ../../admin_usuarios.php");
        exit;
    }
} catch (PDOException $e) {
    die("Erro ao buscar dados.");
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Editar Funcionário | Equipe NEXT</title>
    <link rel="stylesheet" href="../../assets/global.css" />
    <link rel="stylesheet" href="../../assets/admin.css" />
</head>
<body style="display: flex; justify-content: center; align-items: center; min-height: 100vh; background-color: #f4f7f6;">

    <div class="form-container" style="width: 100%; max-width: 500px; background: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
        <h2 style="color: #1f3a5f; margin-bottom: 20px;">Editar Cadastro #<?php echo $usuario['id']; ?></h2>
        
        <?php if ($erro): ?>
            <div style="background-color: #f8d7da; color: #721c24; padding: 10px; margin-bottom: 15px; border-radius: 4px;"><?php echo $erro; ?></div>
        <?php endif; ?>

        <form action="usuario_editar.php" method="POST" class="admin-form">
            <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>" />
            
            <label style="font-size: 13px; font-weight: 600;">Nome</label>
            <input type="text" name="nome" required value="<?php echo htmlspecialchars($usuario['nome']); ?>" style="margin-bottom: 15px; width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;" />
            
            <label style="font-size: 13px; font-weight: 600;">Sobrenome</label>
            <input type="text" name="sobrenome" required value="<?php echo htmlspecialchars($usuario['sobrenome']); ?>" style="margin-bottom: 15px; width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;" />
            
            <label style="font-size: 13px; font-weight: 600;">E-mail corporativo</label>
            <input type="email" name="email" required value="<?php echo htmlspecialchars($usuario['email']); ?>" style="margin-bottom: 15px; width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;" />
            
            <label style="font-size: 13px; font-weight: 600;">Nível de Acesso</label>
            <select name="nivel_acesso" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; margin-bottom: 20px;">
                <option value="admin" <?php echo $usuario['nivel_acesso'] === 'admin' ? 'selected' : ''; ?>>Administrador</option>
                <option value="cliente" <?php echo $usuario['nivel_acesso'] === 'cliente' ? 'selected' : ''; ?>>Cliente</option>
            </select>

            <div style="display: flex; gap: 10px;">
                <button type="submit" class="btn-salvar" style="flex: 1;">Atualizar Cadastro</button>
                <a href="../../admin_usuarios.php" class="btn-excluir" style="flex: 1; text-align: center; line-height: 2.8; border-radius: 4px; background-color: #6c757d; text-decoration: none; color: white;">Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>