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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" />
</head>
<body class="page-centered-body">

    <div class="edit-card">
        <h2>Editar Cadastro #<?php echo $usuario['id']; ?></h2>
        
        <?php if ($erro): ?>
            <div class="alert alert-danger"><?php echo $erro; ?></div>
        <?php endif; ?>

        <form action="usuario_editar.php" method="POST" class="admin-form">
            <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>" />
            
            <label class="form-label">Nome</label>
            <input type="text" name="nome" required value="<?php echo htmlspecialchars($usuario['nome']); ?>" class="form-field" />
            
            <label class="form-label">Sobrenome</label>
            <input type="text" name="sobrenome" required value="<?php echo htmlspecialchars($usuario['sobrenome']); ?>" class="form-field" />
            
            <label class="form-label">E-mail corporativo</label>
            <input type="email" name="email" required value="<?php echo htmlspecialchars($usuario['email']); ?>" class="form-field" />
            
            <label class="form-label">Nível de Acesso</label>
            <select name="nivel_acesso" class="form-select">
                <option value="admin" <?php echo $usuario['nivel_acesso'] === 'admin' ? 'selected' : ''; ?>>Administrador</option>
                <option value="cliente" <?php echo $usuario['nivel_acesso'] === 'cliente' ? 'selected' : ''; ?>>Cliente</option>
            </select>

            <div class="form-actions">
                <button type="submit" class="btn-salvar">Atualizar Cadastro</button>
                <a href="../../admin_usuarios.php" class="btn-cancelar">Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>
