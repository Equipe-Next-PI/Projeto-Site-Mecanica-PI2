<?php
// 1. Inclui os componentes estruturais do topo
require_once './includes/header.php';

// 2. Importa a instância ativa do banco de dados
require_once './config/conexao.php';

try {
    // 3. Prepara a query SQL de leitura
    $stmt = $pdo->query("SELECT id, nome, descricao, preco, estoque, imagem FROM produtos WHERE estoque > 0");
    $produtos = $stmt->fetchAll();
} catch (PDOException $e) {
    echo "Erro ao carregar o catálogo: " . $e->getMessage();
}
?>

<div class="products-grid">
    <?php foreach ($produtos as $produto): ?>
        <div class="product-card">
            <img src="<?php echo htmlspecialchars($produto['imagem']); ?>" alt="Imagem do produto">
            <h3>
                <?php echo htmlspecialchars($produto['nome']); ?>
            </h3>
            <p>R$
                <?php echo number_format($produto['preco'], 2, ',', '.'); ?>
            </p>
        </div>
    <?php endforeach; ?>
</div>

<?php require_once './includes/footer.php'; ?>

<main class="page-produtos" id="produtos">
    <div class="services-header-container" style="margin-top: 40px;">
        <h2 class="section-title">Nossos Produtos</h2>
        <div class="section-subtitle">
            Peças e acessórios de qualidade <span class="star-icon">★</span>
        </div>
    </div>

    <section class="products-grid-container">
        <div class="products-grid">

            <?php foreach ($produtos_cadastrados as $produto): ?>
                <div class="product-card">
                    <div class="product-image-wrapper">
                        <img src="<?php echo $produto['imagem']; ?>" alt="<?php echo $produto['nome']; ?>"
                            class="product-image">
                    </div>
                    <div class="product-info">
                        <h3 class="product-name"><?php echo $produto['nome']; ?></h3>
                        <p class="product-desc"><?php echo $produto['descricao']; ?></p>
                        <div class="product-price-row">
                            <span class="product-price">R$ <?php echo $produto['preco']; ?></span>
                            <button class="btn-buy">Comprar</button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </section>
</main>