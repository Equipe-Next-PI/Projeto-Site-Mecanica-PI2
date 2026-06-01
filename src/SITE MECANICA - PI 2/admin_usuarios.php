<?php
session_start();

if (!isset($_SESSION['usuario_id']) || $_SESSION['nivel_acesso'] !== 'admin') {
    header("Location: ./login.php?erro=acesso_negado");
    exit;
}

require_once './config/conexao.php'; 

try {
    $stmt = $pdo->query("SELECT id, nome, sobrenome, email, nivel_acesso, data_criacao FROM usuarios ORDER BY id DESC");
    $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erro ao carregar usuários: " . $e->getMessage());
}

$sucesso = isset($_GET['sucesso']) ? $_GET['sucesso'] : null;
$erro    = isset($_GET['erro'])    ? $_GET['erro']    : null;
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin - Controle de Equipe | Equipe NEXT</title>
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
            <a href="./admin_produtos.php">Produtos / Estoque</a>
            <a href="./admin_usuarios.php" class="active">Gerenciar Equipe</a>
            <a href="./admin_formularios.php">Mensagens</a>
            <a href="./modules/auth/logout.php" class="btn-logout-nav">Sair</a>
        </div>
    </header>

    <main class="admin-container">
        
        <section class="admin-content">
            <div class="content-header">
                <h1>Membros da Equipe / Clientes</h1>
                
                <?php if ($sucesso === '1'): ?>
                    <div class="alert alert-success">Novo usuário registrado com sucesso!</div>
                <?php elseif ($sucesso === 'excluido'): ?>
                    <div class="alert alert-success">Usuário excluído do sistema.</div>
                <?php elseif ($sucesso === 'editado'): ?>
                    <div class="alert alert-info">Dados do usuário atualizados!</div>
                <?php elseif ($erro === 'auto_exclusao'): ?>
                    <div class="alert alert-danger">Ação Negada: Você não pode excluir a sua própria conta!</div>
                <?php endif; ?>
            </div>

            <div class="table-container">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome Completo</th>
                            <th>E-mail</th>
                            <th>Nível de Acesso</th>
                            <th>Ações</th> 
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($usuarios as $user): ?>
                            <tr>
                                <td><?php echo $user['id']; ?></td>
                                <td><?php echo htmlspecialchars($user['nome'] . ' ' . $user['sobrenome']); ?></td>
                                <td><?php echo htmlspecialchars($user['email']); ?></td>
                                <td>
                                    <?php if ($user['nivel_acesso'] === 'admin'): ?>
                                        <span class="badge-acesso badge-admin"><?php echo strtoupper($user['nivel_acesso']); ?></span>
                                    <?php else: ?>
                                        <span class="badge-acesso badge-cliente"><?php echo strtoupper($user['nivel_acesso']); ?></span>
                                    <?php endif; ?>
                                </td>
                                <td class="td-acoes">
                                    <a href="./modules/usuarios/usuario_editar.php?id=<?php echo $user['id']; ?>" class="btn-editar">Editar</a>
                                    <a href="./modules/usuarios/usuario_excluir.php?id=<?php echo $user['id']; ?>" class="btn-excluir" onclick="return confirm('Tem certeza que deseja excluir o funcionário <?php echo htmlspecialchars($user['nome']); ?>?');">Excluir</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>

        <aside class="admin-sidebar">
            <div class="form-container">
                <h3>Cadastrar Novo Usuário</h3>
                <form action="./modules/usuarios/registrar_action.php" method="POST" class="admin-form">
                    <input type="text" name="nome" placeholder="Nome" required />
                    <input type="text" name="sobrenome" placeholder="Sobrenome" required />
                    <input type="email" name="email" placeholder="E-mail corporativo" required />
                    <input type="password" name="senha" placeholder="Senha de Acesso" required />
                    
                    <label class="form-label-permissao">Nível de Permissão:</label>
                    <select name="nivel_acesso" class="form-select-permissao">
                        <option value="admin">Administrador (Gerente/Mecânico)</option>
                        <option value="cliente">Cliente (Apenas visualização)</option>
                    </select>

                    <button type="submit" class="btn-salvar">Registrar Usuário</button>
                </form>
            </div>
        </aside>

    </main>
</body>
</html>
