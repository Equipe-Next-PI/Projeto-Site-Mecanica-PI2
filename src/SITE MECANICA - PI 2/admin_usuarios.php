<?php
session_start();

// TRAVA DE SEGURANÇA: Só entra se for Admin logado
if (!isset($_SESSION['usuario_id']) || $_SESSION['nivel_acesso'] !== 'admin') {
    header("Location: ./login.php?erro=acesso_negado");
    exit;
}

require_once './config/conexao.php'; 

// Puxa todos os usuários do banco para listar na tabela
try {
    $stmt = $pdo->query("SELECT id, nome, sobrenome, email, nivel_acesso, data_criacao FROM usuarios ORDER BY id DESC");
    $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erro ao carregar usuários: " . $e->getMessage());
}

$sucesso = isset($_GET['sucesso']) ? $_GET['sucesso'] : null;
$erro = isset($_GET['erro']) ? $_GET['erro'] : null;
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
            <div class="logo2">EQUIPE <span style="color: #ff6b00;">NEXT</span></div>
        </div>
        <div class="admin-nav-links">
            <a href="./admin_produtos.php">Produtos / Estoque</a>
            <a href="./admin_usuarios.php">Gerenciar Equipe</a>
            <a href="./admin_formularios.php">Mensagens</a> 
            <a href="./modules/auth/logout.php" style="color: #dc3545; font-weight: 700;">Sair</a>
        </div>
    </header>

    <main class="admin-container">
        
        <section class="admin-content">
            <div class="content-header">
                <h1>Membros da Equipe / Clientes</h1>
                
                <?php if ($sucesso === '1'): ?>
                    <div style="background-color: #d4edda; color: #155724; padding: 10px; margin-top: 15px; border-radius: 4px; font-size: 14px;">Novo usuário registrado com sucesso!</div>
                <?php elseif ($sucesso === 'excluido'): ?>
                    <div style="background-color: #d4edda; color: #155724; padding: 10px; margin-top: 15px; border-radius: 4px; font-size: 14px;">Usuário excluído do sistema.</div>
                <?php elseif ($sucesso === 'editado'): ?>
                    <div style="background-color: #cce5ff; color: #004085; padding: 10px; margin-top: 15px; border-radius: 4px; font-size: 14px;">Dados do usuário atualizados!</div>
                <?php elseif ($erro === 'auto_exclusao'): ?>
                    <div style="background-color: #f8d7da; color: #721c24; padding: 10px; margin-top: 15px; border-radius: 4px; font-size: 14px;">Ação Negada: Você não pode excluir a sua própria conta!</div>
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
                            <th>Ações</th> </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($usuarios as $user): ?>
                            <tr>
                                <td><?php echo $user['id']; ?></td>
                                <td><?php echo htmlspecialchars($user['nome'] . ' ' . $user['sobrenome']); ?></td>
                                <td><?php echo htmlspecialchars($user['email']); ?></td>
                                <td>
                                    <span style="padding: 3px 8px; border-radius: 4px; font-size: 12px; font-weight: 600; background: <?php echo $user['nivel_acesso'] === 'admin' ? '#e2eefa; color: #004085;' : '#eee; color: #333;'; ?>">
                                        <?php echo strtoupper($user['nivel_acesso']); ?>
                                    </span>
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
                    
                    <label style="font-size: 12px; font-weight: 600; margin-top: 10px; display: block;">Nível de Permissão:</label>
                    <select name="nivel_acesso" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; margin-bottom: 20px; font-family: inherit;">
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